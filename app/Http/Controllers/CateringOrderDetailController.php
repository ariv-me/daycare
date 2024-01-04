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

        $kosong      = CateringOrderDetail::where('kar_id',$app['kar_id'])->where('is_aktif','T')->delete();

        return view('catering.order.index',compact('app','menu'));
    }




    /*------------------------------------------ DETAIL ----------------------------------------------------*/
   
    public function save(Request $r){

        $app         = SistemApp::sistem();
        $menu        = CateringMenu::get()->where('menu_kode',$r->menu)->first();
        $transaction = DB::connection('daycare')->transaction(function() use($r,$menu,$app){

            /*-- SAVE --*/

            $cek = CateringOrderDetail::where('anak_kode',$r->anak_kode)->where('detail_status','O')->where('menu_kode',$menu->menu_kode)->count();

            if($cek > 0){
                
                $tmp = CateringOrderDetail::where('anak_kode',$r->anak_kode)->where('detail_status','O')->where('menu_kode',$menu->menu_kode)->first();

                $tmp->anak_kode         = $r->anak_kode;
                $tmp->menu_kode         = $menu->menu_kode;
                $tmp->detail_tgl        = Carbon::now()->toDateString();
                $tmp->detail_jam        = Carbon::now()->toTimeString();
                $tmp->detail_qty        = $r->qty + $tmp->detail_qty;

                $tmp->detail_harga      = $menu->menu_harga;
                $tmp->detail_total      = $tmp->detail_harga * $tmp->detail_qty;
                
                $tmp->created_nip       = $app['kar_nip'];
                $tmp->created_nama      = $app['kar_nama_awal'];
                $tmp->created_ip        = $r->ip();
                
                $tmp->save();

                return true;

            } else {
                
                $tmp = new CateringOrderDetail();

                $tmp->anak_kode         = $r->anak_kode;
                $tmp->menu_kode         = $menu->menu_kode;
                $tmp->detail_tgl        = Carbon::now()->toDateString();
                $tmp->detail_jam        = Carbon::now()->toTimeString();
                $tmp->detail_qty        = $r->qty;

                $tmp->detail_harga      = $menu->menu_harga;
                $tmp->detail_total      = $tmp->detail_harga * $r->qty;
                
                $tmp->created_nip       = $app['kar_nip'];
                $tmp->created_nama      = $app['kar_nama_awal'];
                $tmp->created_ip        = $r->ip();
                
                $tmp->save();

                return true;
            }


        });

        return response()->json($transaction);

    }

    public function view(Request $r){

        $result = array('success'=>false);

        try{

            $app = SistemApp::sistem();
            $data = DB::connection('daycare')
                    ->table('ctrg_tc_order_detail AS aa')
                    ->leftjoin('dapok_tb_anak AS bb','bb.anak_kode','=','aa.anak_kode')
                    ->leftjoin('ctrg_tb_menu AS cc','cc.menu_kode','=','aa.menu_kode')
                    ->leftjoin('ctrg_ta_kategori AS dd','dd.kat_id','=','cc.kat_id')
                    //->where('aa.detail_aktif','T')
                    ->where('aa.anak_kode',$r->kode)
                    ->orderby('aa.detail_id','desc')
                    ->get();
                            
            $data = $data->map(function($value) {
    
                $value->menu_kode           = strtoupper($value->menu_kode);
                $value->harga_tampil        = format_rupiah($value->menu_harga);
                $value->total_tampil        = format_rupiah($value->detail_total);
               
                return $value;

            });

            // dd($order_kode);

        } catch (\Exception $e) {
            $result['message'] = $e->getMessage();  
            return response()->json($result);
        }

        $result['success'] = true;
        $result['data'] = $data;
        $result['total'] = format_rupiah($data->sum('detail_total'));

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
        $result['menu_harga']       = format_rupiah($data->detail_harga_jual);


        return response()->json($data);
    }

    public function update(Request $r){

        $transaction = DB::connection('daycare')->transaction(function() use($r){
  
              $app = SistemApp::sistem();
              $id = $r->get('kode');
 
              $tmp = CateringOrderDetail::where('detail_id',$id)->first();

              $tmp->detail_status     = $r->status;
              $tmp->petugas_nip       = $app['kar_nip'];
              $tmp->petugas_nama      = $app['kar_nama_awal'];
              $tmp->updated_jam       = Carbon::now()->toTimeString();
              $tmp->updated_ip        = $r->ip();

              $tmp->save();
  
              return true;
          });
  
          return response()->json($transaction);   
    }

    public function update_detail(Request $r){

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
  
    public function delete(Request $r){

        $id =$r->get('id');
        $data = CateringOrderDetail::where('detail_id',$id)->delete();
        return response()->json($data);

    }





}
