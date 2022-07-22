<?php

namespace App\Http\Controllers;

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
use App\Models\Anak;
use App\Models\Ortu;
use App\Models\SistemAgama;



class ComboSistemController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
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

    /*-- HUBUNGAN  --*/
    public function combo_hubungan(){
        $data = SistemHubungan::orderby('hub_id')->get();
        return response()->json($data); 
    }

    /*-- BULAN --*/
    public function combo_bulan(){
        $data = SistemBulan::orderby('bulan_id')->get();
        return response()->json($data); 
    }

    public function combo_grup(){
        $data = Grup::orderby('grup_id')->get();
        return response()->json($data); 
    }

    public function combo_perusahaan(){
        $data = DB::connection('daycare')
                    ->table('tb_perusahaan AS aa')
                    ->leftjoin('tb_grup AS bb','bb.grup_id','=','aa.grup_id')
                    ->orderby('bb.grup_id')
                    ->where('bb.aktif','Y')
                    ->get();
        return response()->json($data);
    }

    public function combo_jenis_pendaftaran(){
        $data = JenisPendaftaran::orderby('jenis_id')->get();
        return response()->json($data); 
    }

    public function combo_jenis_pekerjaan(){
        $data = JenisPekerjaan::orderby('kerja_id')->get();
        return response()->json($data); 
    }

    public function combo_anak(){
        $data = Anak::orderby('anak_nis')->get();
        return response()->json($data); 
    }

    public function combo_ortu(){
        $data = Ortu::orderby('ortu_id')->get();
        return response()->json($data); 
    }

    public function combo_agama(){
        $data = SistemAgama::orderby('agama_id')->get();
        return response()->json($data); 
    }

}
