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
 
         $data = DB::connection('daycare')
                         ->table('tarif_tb_item')
                         ->where('item_aktif','Y')
                         ->orderby('item_nama')
                         ->get();

         return response()->json($data);
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
       
        $data = DB::connection('daycare')
                        ->table('tarif_tc_tarif AS aa')
                       // ->leftjoin('tarif_ta_kategori AS bb','bb.kat_kode','=','aa.kat_kode')
                        // ->where('aa.kat_kode',$r->kategori)
                        ->orderby('tarif_kode','desc')
                        ->get();
                        
        return response()->json($data); 
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

    public function combo_anak(){
        $data = DB::connection('daycare')
                    ->table('dapok_tb_anak AS aa')
                    ->leftjoin('dapok_tb_ortu AS bb','bb.ortu_id','=','aa.ortu_id')
                    ->where('anak_aktif','Y')
                    ->orderby('anak_id','desc')
                    ->get();
        return response()->json($data); 
    }

    public function combo_ortu(){
        $data = DapokOrtu::orderby('ortu_id','desc')->where('ortu_aktif','Y')->get();
        return response()->json($data); 
    }

    public function combo_penjemput(){
        $data = DapokPenjemput::orderby('pnj_id','desc')->where('pnj_aktif','Y')->get();
        return response()->json($data); 
    }





 

    
}
