<?php

namespace App\Http\Controllers;

use App\Models\SistemGrupDetail;
use StdClass;
Use DB;
use Illuminate\Http\Request;


use App\Models\SistemPekerjaan;
use App\Models\SistemHubungan;
use App\Models\SistemBulan;
use App\Models\Grup;
use App\Models\Perusahaan;
use App\Models\JenisPendaftaran;
use App\Models\JenisPekerjaan;
use App\Models\DapokAnak;
use App\Models\DapokOrtu;
use App\Models\DapokKontakDarurat;
use App\Models\DapokPenjemput;
use App\Models\SistemAgama;
use App\Models\CateringKategori;
use App\Models\TarifJenis;
use App\Models\Tarif;
use App\Models\TarifKategori;
use App\Models\Periode;




class ComboSistemController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

     /*-- KECAMATAN --*/
     public function combo_kecamatan(Request $r)
     {
         $kota = $r->kota;
         $data = DB::connection('spf')
                         ->table('sistem_ta_3_kecamatan as aa')
                         ->where('aa.kota_kode',$kota)
                         ->orderby('aa.kec_nama')
                         ->get();
        
     
         return response()->json($data);
     }
 
     /*-- KOTA --*/
     public function combo_kota(Request $r)
     {
 
         $provinsi = $r->provinsi;
         $data = DB::connection('spf')
                         ->table('sistem_ta_2_kota as aa')
                         ->where('aa.prov_kode',$provinsi)
                         ->get();
     
         return response()->json($data);
     }
 
     /*-- PROVINSI --*/
     public function combo_provinsi()
     {
 
         $data = DB::connection('spf')
                         ->table('sistem_ta_1_provinsi as aa')
                         ->orderby('prov_nama')
                         ->get();

     
         return response()->json($data);
     }
 

    
    /*-- JENIS --*/
    public function combo_jenis()
    {
        $data = SistemJenis::where('jenis_aktif','Y')->orderby('jenis_nama')->get();
        return response()->json($data); 
    }

    /*-- PEKERJAAN  --*/
    public function combo_pekerjaan(){
        $data = SistemPekerjaan::orderby('pekerjaan_id')->get();
        return response()->json($data); 
    }


    public function combo_bulan(){
        $data = SistemBulan::orderby('bulan_id')->get();
        return response()->json($data); 
    }

    public function combo_grup(){
        $data = Grup::orderby('grup_urut','asc')->where('grup_aktif','Y')->get();
        return response()->json($data); 
    }
    public function combo_grup_detail(){
        $data = SistemGrupDetail::orderby('detail_id','desc')->where('detail_aktif','Y')->get();
        return response()->json($data); 
    }

    public function combo_tarif_kategori(){
        $data = TarifKategori::orderby('kat_id','desc')->where('kat_aktif','Y')->get();
        return response()->json($data); 
    }

    public function combo_paket(Request $r){
       
        $data = DB::connection('daycare')
                        ->table('tarif_tc_tarif AS aa')
                        ->leftjoin('tarif_ta_kategori AS bb','bb.kat_id','=','aa.kat_id')
                        // ->where('aa.kat_id',$r->kategori)
                        ->orderby('tarif_kode','desc')
                        ->get();
        return response()->json($data); 
    }

    public function combo_perusahaan(){
        $data = DB::connection('daycare')
                    ->table('sistem_tb_perusahaan AS aa')
                    ->leftjoin('sistem_tb_grup_detail AS bb','bb.grup_id','=','aa.grup_id')
                    ->orderby('bb.grup_id')
                    ->where('aa.peru_aktif','Y')
                    ->where('bb.grup_aktif','Y')
                    ->orderby('peru_id','desc')
                    ->get();
        return response()->json($data);
    }

     /*-- JENJANG PENDIDIKAN--*/
     public function combo_pendidikan(){

        $data = DB::connection('spf')
                    ->table('hcm_ta_pendidikan AS aa')
                    ->where('pdk_aktif','Y')
                    ->get();

        return response()->json($data); 

    }

    /*-- HUBUNGAN  --*/
    public function combo_hubungan(){
        $data = DB::connection('spf')
                    ->table('hcm_ta_hubungan AS aa')
                    ->where('hub_aktif','Y')
                    ->orderby('hub_level','asc')
                    ->get();
        return response()->json($data); 
    }

    public function combo_jenis_tarif(){
        $data = TarifJenis::orderby('jenis_id','desc')->where('jenis_aktif','Y')->get();
        return response()->json($data); 
    }

    public function combo_jenis_pendaftaran(){
        $data = JenisPendaftaran::orderby('jenis_id')->get();
        return response()->json($data); 
    }

    public function combo_jenis_pekerjaan(){
        $data = JenisPekerjaan::orderby('kerja_nama','asc')->where('aktif','Y')->get();
        return response()->json($data); 
    }

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

    public function combo_kontak(){
        $data = DapokKontakDarurat::orderby('kontak_id','desc')->where('kontak_aktif','Y')->get();
        return response()->json($data); 
    }

    public function combo_agama(){
        $data = SistemAgama::orderby('agama_id')->where('agama_aktif','Y')->get();
        return response()->json($data); 
    }

    public function combo_kategori(){
        $data = TarifKategori::orderby('kat_id')->where('kat_aktif','Y')->get();
        return response()->json($data); 
    }

    public function combo_periode(){
        $data = Periode::orderby('periode_id')->where('periode_aktif','Y')->get();
        return response()->json($data); 
    }

}
