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
use App\Models\CateringMenuItem;


class CateringMenuController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        
        $app = SistemApp::sistem();
        $menu = SistemApp::OtoritasMenu($app['idu']);
        return view('catering.menu.index',compact('app','menu'));
    }

   
    public function save(Request $r){

        $periksa_kode = CateringMenu::periksa_kode($r->kode);

        if($periksa_kode > 0){

            $transaction = false;

        } else{

            $transaction = DB::connection('daycare')->transaction(function() use($r){

                $app = SistemApp::sistem();
                $tmp = new CateringMenu();
                
                $data = $r->get('kategori');

                $tmp->menu_kode             = $r->kode;
                $tmp->kat_id                = $r->kategori;
                $tmp->menu_nama             = $r->nama;
                $tmp->menu_deskripsi        = $r->deskripsi;
                $tmp->menu_harga            = str_replace(".", "", $r->harga);

                $tmp->created_nip   = $app['kar_id'];
                $tmp->created_nama  = $app['kar_nama_awal'];
                $tmp->created_ip    = $r->ip();
    
                $tmp->save();

                return true;
    
            });

        }
   
        return response()->json($transaction);

    }

    public function view(Request $r){

        $result = array('success'=>false);

        try{
            
            $data = DB::connection('daycare')
                            ->table('ctrg_tb_menu AS aa')
                            ->leftjoin('ctrg_ta_kategori AS bb','bb.kat_id','=','aa.kat_id')
                            ->orderby('aa.menu_id','desc')
                            ->get();

             $data = $data->map(function($value) {
                 
                $value->menu_kode    = strtoupper($value->menu_kode);
                $value->harga        = format_rupiah($value->menu_harga);
                // $value->harga_jual_tampil   = format_rupiah($value->menu_harga_jual);

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
        $id = strtolower($r->get('id'));
        $data = CateringMenu::where('menu_kode',$id)->first();


        return response()->json($data);
    }

    public function update(Request $r){

        $transaction = DB::connection('daycare')->transaction(function() use($r){
  
              $app = SistemApp::sistem();
  
              $id = $r->get('kode');
 
              $tmp = CateringMenu::where('menu_kode',$id)->first();

            //   $tmp->menu_kode = $r->kode;
              $tmp->kat_id         = $r->kategori;
              $tmp->menu_nama      = $r->nama;
              $tmp->menu_deskripsi = $r->deskripsi;
              $tmp->menu_harga    = str_replace(".", "", $r->harga);

              $tmp->updated_nip   = $app['kar_id'];
              $tmp->updated_nama  = $app['kar_nama_awal'];
              $tmp->updated_ip    = $r->ip();

              //dd($tmp);
            
              $tmp->save();
  
              return true;
          });
  
          return response()->json($transaction);   
    }
  
    public function aktif(Request $r){
  
          $transaction = DB::connection('daycare')->transaction(function() use($r){  
  
              $app = SistemApp::sistem();
  
              $id = $r->get('id');
              $tmp = CateringMenu::where('menu_kode',$id)->first();
              $tmp->menu_aktif = 'Y';
              $tmp->save();
  
              return true;
          });
  
          return response()->json($transaction);
         
    }
  
    public function nonaktif(Request $r){
  
          $transaction = DB::connection('daycare')->transaction(function() use($r){ 
              
              $app = SistemApp::sistem();
  
              $id = $r->get('id');
              $tmp = CateringMenu::where('menu_kode',$id)->first();
              $tmp->menu_aktif = 'T';

              $tmp->save();
  
              return true;
          });
  
          return response()->json($transaction);
    }

    public function item_save(Request $r){

    
        $transaction = DB::connection('daycare')->transaction(function() use($r){

            $app = SistemApp::sistem();
            $tmp = new CateringMenuItem();

            $kode = $r->get('kode');

            $tmp->menu_kode      = $kode;
            $tmp->item_nama      = $r->nama;

            $tmp->save();

        });

   
        return response()->json($transaction);

    }

    public function item_view(Request $r){

        $result = array('success'=>false);

        try{
            
            $id = $r->get('id');

            $data = DB::connection('daycare')
                            ->table('ctrg_tb_menu_item AS aa')
                            ->leftjoin('ctrg_tb_menu AS bb','bb.menu_kode','=','aa.menu_kode')
                            ->where('aa.menu_kode',$id)
                            ->orderby('aa.item_id','desc')
                            ->get();

        } catch (\Exception $e) {
            $result['message'] = $e->getMessage();  
            return response()->json($result);
        }

        $result['success'] = true;
        $result['data'] = $data;

        return response()->json($result);

    }

    public function item_menu_view(Request $r){

        $result = array('success'=>false);

        try{
            
            $id = $r->get('id');

            $data = DB::connection('daycare')
                            ->table('ctrg_tb_menu_item AS aa')
                            ->leftjoin('ctrg_tb_menu AS bb','bb.menu_kode','=','aa.menu_kode')
                            ->orderby('aa.item_id','desc')
                            ->get();

        } catch (\Exception $e) {
            $result['message'] = $e->getMessage();  
            return response()->json($result);
        }

        $result['success'] = true;
        $result['data'] = $data;

        return response()->json($result);

    }

    public function item_delete(Request $r){


        $id =$r->get('id');
        $data = CateringMenuItem::where('item_id',$id)->delete();
        return response()->json($data);

    }





}
