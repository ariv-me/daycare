<?php

namespace App\Http\Controllers;

use StdClass;
Use DB;
use Illuminate\Http\Request;

use App\Models\TarifJenis;
use App\Models\Tarif;
use App\Models\TarifKategori;

use App\Models\DapokAnak;
use App\Models\DapokOrtu;
use App\Models\DapokPenjemput;

class ComboController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    // Combo Tarif

    public function combo_tarif_jenis() {
 
         $data = DB::connection('daycare')
                         ->table('tarif_ta_jenis')
                         ->where('jenis_aktif','Y')
                         ->orderby('jenis_kode')
                         ->get();

         return response()->json($data);
    }


    public function combo_tarif_kategori() {
 
         $data = DB::connection('daycare')
                         ->table('tarif_ta_kategori')
                         ->where('kat_aktif','Y')
                         ->orderby('kat_nama')
                         ->get();

         return response()->json($data);
    }

    public function combo_tarif_item() {

        $result = array('success'=>false);

        try{
        
            $data = DB::connection('daycare')
                        ->table('tarif_tb_item')
                        ->where('item_aktif','Y')
                        ->orderby('item_nama')
                        ->get();

            $data = $data->map(function($value) {

                $value->item_nominal = format_rupiah($value->item_nominal);
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

    public function combo_tarif_paket() {
 
         $data = DB::connection('daycare')
                         ->table('tarif_tc_tarif')
                         ->where('tarif_aktif','Y')
                         ->orderby('tarif_nama')
                         ->get();

         return response()->json($data);
    }

    public function combo_tarif_paket2(Request $r){

        $result = array('success'=>false);

        try{

          
            $data = DB::connection('daycare')
                    ->table('tarif_tc_tarif AS aa')
                    ->whereNotIN('aa.jenis_kode',['JN0001'])
                    ->orderby('tarif_kode','desc')
                    ->get();       
        
            $data = $data->map(function($value) {

                $value->tarif_total = format_rupiah($value->tarif_total);
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


    // Combo Catering - Menu

    public function combo_catering_kategori() {
 
        $data = DB::connection('daycare')
                        ->table('ctrg_ta_menu_kategori')
                        ->where('kat_aktif','Y')
                        ->orderby('kat_nama')
                        ->get();

        return response()->json($data);
    }


    public function combo_catering_menu() {
 
        $data = DB::connection('daycare')
                        ->table('ctrg_tb_menu')
                        ->where('menu_aktif','Y')
                        ->orderby('menu_nama')
                        ->get();

        return response()->json($data);
    }

    // Combo Catering - Order

    public function combo_catering_order() {
 
        $data = DB::connection('daycare')
                        ->table('ctrg_ta_menu_kategori')
                        ->where('kat_aktif','Y')
                        ->orderby('kat_nama')
                        ->get();

        return response()->json($data);
    }

    // Combo Data Pokok 

    public function combo_dapok_anak(){
        $data = DB::connection('daycare')
                    ->table('dapok_tb_anak AS aa')
                    ->leftjoin('daftar_tc_member AS bb','bb.anak_kode','=','aa.anak_kode')
                    ->leftjoin('dapok_tb_ortu AS cc','cc.ortu_kode','=','aa.ortu_kode')
                    ->where('aa.anak_aktif','Y')
                    ->orderby('aa.anak_id','desc')
                    ->get();
        return response()->json($data); 
    }

    public function combo_dapok_ortu(){
        $data = DapokOrtu::orderby('ortu_kode','desc')->where('ortu_aktif','Y')->get();
        return response()->json($data); 
    }

    public function combo_dapok_penjemput(){
        $data = DapokPenjemput::orderby('pnj_kode','desc')->where('pnj_aktif','Y')->get();
        return response()->json($data); 
    }





 

    
}
