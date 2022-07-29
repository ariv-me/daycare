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


class CateringOrderDetailController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        
        $app = SistemApp::sistem();
        $menu = SistemApp::OtoritasMenu($app['idu']);
        return view('catering.order.index',compact('app','menu'));
    }

   
    public function save(Request $r){

        $transaction = DB::connection('daycare')->transaction(function() use($r){

            $app = SistemApp::sistem();
            $tmp = new CateringOrderDetail();
            $data = $r;
            
            $order_kode = CateringOrder::order_kode();

            $tmp->order_kode        = $order_kode;
            $tmp->anak_nis          = $r->anak;
            $tmp->menu_kode         = $r->kode;
            $tmp->detail_tgl        = Carbon::now()->toDateString();
            $tmp->detail_jam        = Carbon::now()->toTimeString();
            $tmp->detail_harga      = $r->harga;
            $tmp->detail_jadwal     = $r->jadwal;
            $tmp->kar_id            = $app['kar_id'];
            $tmp->kar_nama          = $app['kar_nama_awal'];
            $tmp->usaha_id          = $app['usaha_id'];
            $tmp->usaha_nama        = $app['usaha_nama'];
            $tmp->created_ip        = $r->ip();

            //dd($tmp);

            $tmp->save();

            return true;

        });

        
   
        return response()->json($transaction);

    }

    public function view(Request $r){

        $result = array('success'=>false);

        try{
            
            $data = DB::connection('daycare')
                            ->table('ctrg_order_detail AS aa')
                            ->leftjoin('tb_anak AS cc','cc.anak_nis','=','aa.anak_nis')
                            ->leftjoin('ctrg_menu AS dd','dd.menu_kode','=','aa.menu_kode')
                            ->leftjoin('ctrg_kategori AS ee','ee.kat_id','=','dd.kat_id')
                            ->where('aa.is_aktif','Y')
                            ->orderby('aa.detail_id','desc')
                            ->get();
                            
            $data = $data->map(function($value) {
    
                $value->menu_kode           = strtoupper($value->menu_kode);
                //$value->item                = $data2->where('menu_kode',$value->menu_kode)->count();
                $value->harga_tampil        = format_rupiah($value->menu_harga);

                return $value;

                });

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
        $data = CateringOrderDetail::where('detail_id',$id)->first();

        $result = array();
        $result['data']             = $data;
        $result['menu_kode']        = $data->menu_kode;
        $result['menu_nama']        = CateringMenu::where('menu_kode',$data->menu_kode)->first()->menu_nama;
        $result['menu_harga']      = format_rupiah($data->detail_harga_jual);


        return response()->json($data);
    }

    public function update(Request $r){

        $transaction = DB::connection('mysql')->transaction(function() use($r){
  
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
  
    public function delete(Request $r){

        $transaction = DB::connection('mysql')->transaction(function() use($r){ 
              
            $app = SistemApp::sistem();

            $id = $r->get('id');
            $tmp = CateringOrderDetail::where('detail_id',$id)->first();
            $tmp->is_aktif = 'T';

            $tmp->save();

            return true;
        });

        return response()->json($transaction);

    }





}
