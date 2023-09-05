<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SistemApp;
use App\Helpers;
use Carbon\Carbon;

use DB;


use App\Models\Anak;
use App\Models\Ortu;
use App\Models\CateringMenu;
use App\Models\CateringKategori;
use App\Models\CateringOrder;
use App\Models\CateringOrderDetail;
use App\Models\CateringMenuItem;
use App\Models\HCISKaryawan;


class CateringOrderDataController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        
        $app = SistemApp::sistem();
        $menu = SistemApp::OtoritasMenu($app['idu']);
        return view('catering.order.data.index',compact('app','menu'));
    }


    public function save(Request $r){

        $app       = SistemApp::sistem();
        $kode = $r->kode;

        $menu      = CateringMenu::get()->where('menu_kode',$r->kode)->first();


        $transaction = DB::connection('daycare')->transaction(function() use($r,$menu,$app){

            /*-- SAVE --*/
            $tmp = new CateringOrderDetail();

            $diskon = 0;
            $qty   = 1;

            $tmp->anak_nis          = $r->anak;
            $tmp->menu_kode         = $menu->menu_kode;
            $tmp->detail_tgl        = Carbon::now()->toDateString();
            $tmp->detail_jam        = Carbon::now()->toTimeString();
            $tmp->detail_qty        = $qty;

            $tmp->detail_harga      = $menu->menu_harga;
            $tmp->detail_harga_jual = $menu->menu_harga_jual;
            $tmp->detail_jadwal     = $r->jadwal;


            /*-- DISKON --*/

            $tmp->detail_diskon          = $diskon;
            $tmp->detail_diskon_rupiah   = ($diskon/100) * ($menu->detail_harga_jual * $qty);
            $tmp->detail_subtotal        = $menu->menu_harga_jual * $qty;
            $tmp->detail_subtotal_diskon = ($menu->menu_harga_jual * $qty) - ($diskon/100) * ($menu->menu_harga_jual * $qty) ;
            
            $tmp->kar_id            = $app['kar_id'];
            $tmp->kar_nama          = $app['kar_nama_awal'];
            $tmp->usaha_id          = $app['usaha_id'];
            $tmp->usaha_nama        = $app['usaha_nama'];
            $tmp->created_ip        = $r->ip();


            $tmp->save();

            return true;

        });

        return response()->json($transaction);

    }

    public function view(Request $r){

        $result = array('success'=>false);

        try{

            $tgl_mulai  = $r->get('tgl_mulai');
            $tgl_akhir  = $r->get('tgl_akhir');
            $status     = $r->get('status');


            $tanggal_mulai = $tgl_mulai ? date('Y-m-d', strtotime($tgl_mulai)) : date('Y-m-d');
            $tanggal_akhir = $tgl_akhir ? date('Y-m-d', strtotime($tgl_akhir)) : date('Y-m-d');

            $order_kode = CateringOrder::order_kode();
       
            if($status == 'Semua'){

                $data = DB::connection('daycare')
                            ->table('ctrg_order_detail AS aa')
                            ->leftjoin('ctrg_order AS bb','bb.order_kode','=','aa.order_kode')
                            ->leftjoin('dapok_tb_anak AS cc','cc.anak_nis','=','aa.anak_nis')
                            ->leftjoin('ctrg_menu AS dd','dd.menu_kode','=','aa.menu_kode')
                            ->leftjoin('ctrg_kategori AS ee','ee.kat_id','=','dd.kat_id')
                            ->where('bb.order_tgl', '>=', $tanggal_mulai)
                            ->where('bb.order_tgl', '<=', $tanggal_akhir)
                            ->where('aa.is_aktif','Y')
                            ->orderby('aa.order_kode','desc')
                            ->get();
            } else {

                $data = DB::connection('daycare')
                            ->table('ctrg_order_detail AS aa')
                            ->leftjoin('ctrg_order AS bb','bb.order_kode','=','aa.order_kode')
                            ->leftjoin('dapok_tb_anak AS cc','cc.anak_nis','=','aa.anak_nis')
                            ->leftjoin('ctrg_menu AS dd','dd.menu_kode','=','aa.menu_kode')
                            ->leftjoin('ctrg_kategori AS ee','ee.kat_id','=','dd.kat_id')
                            ->where('bb.order_tgl', '>=', $tanggal_mulai)
                            ->where('bb.order_tgl', '<=', $tanggal_akhir)
                            ->where('aa.detail_status', $status)
                            ->where('aa.is_aktif','Y')
                            ->orderby('aa.order_kode','desc')
                            ->get();
            }

            $data = $data->map(function($value) {
    
                $value->menu_kode           = strtoupper($value->menu_kode);
                $value->harga_tampil        = format_rupiah($value->menu_harga);
                $value->harga_jual_tampil   = format_rupiah($value->menu_harga_jual);
                $value->harga_total         = format_rupiah($value->detail_subtotal_diskon);
               
                return $value;

            });

            // dd($order_kode);

        } catch (\Exception $e) {
            $result['message'] = $e->getMessage();  
            return response()->json($result);
        }

        $result['success'] = true;
        $result['data'] = $data;

        return response()->json($result);

    }

  

    public function edit(Request $r)
    {
        $id = $r->get('id');

        $data = CateringOrderDetail::where('order_kode',$id)->first();

        $result = array();
        $result['data']             = $data;
        $result['menu_kode']        = $data->menu_kode;
        $result['menu_nama']        = CateringMenu::where('menu_kode',$data->menu_kode)->first()->menu_nama;
        $result['menu_harga']       = format_rupiah($data->detail_harga_jual);


        return response()->json($data);
    }

    public function update(Request $r){

        $transaction = DB::connection('daycare')->transaction(function() use($r){
  
              $app = SistemApp::sistem();
  
              $id = $r->get('kode');
 
              $tmp = CateringOrderDetail::where('detail_id',$id)->first();

              $tmp->menu_kode = $r->kode;
              $tmp->menu_nama = $r->nama;
              $tmp->menu_harga = $r->harga;
            
              $tmp->save();
  
              return true;
          });
  
          return response()->json($transaction);   
    }
  
    public function void(Request $r){

        $id =$r->get('id');
        $data = CateringOrderDetail::where('detail_id',$id)->delete();
        return response()->json($data);

    }





}
