<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SistemApp;
use App\Helpers;
use Carbon\Carbon;

use DB;

use App\Models\Pendaftaran;
use App\Models\Grup;
use App\Models\Anak;
use App\Models\Ortu;
use App\Models\Perusahaan;
use App\Models\SistemAgama;
use App\Models\Penjemput;

class PenjemputController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function save (Request $r){

        $transaction = DB::connection('daycare')->transaction(function() use($r){

            $app = SistemApp::sistem();
            $tmp = new Penjemput();
            $tmp->pnj_nama              = $r->penjemput_nama;
            $tmp->pnj_nik               = $r->penjemput_nik;
            $tmp->pnj_tgl_lahir         = $r->penjemput_lahir;
            $tmp->pnj_tmp_lahir         = $r->penjemput_tmp_lahir;
            $tmp->pnj_kerja_id          = $r->penjemput_kerja;
            $tmp->pnj_peru_id           = $r->penjemput_perusahaan;
            $tmp->pnj_hp                = $r->penjemput_hp;
            $tmp->pnj_wa                = $r->penjemput_wa;
            $tmp->pnj_agama_id          = $r->penjemput_agama;
            $tmp->pnj_pdk_id            = $r->penjemput_pdk;
            $tmp->pnj_jekel             = $r->penjemput_jekel;
            $tmp->pnj_hub_id       = $r->penjemput_hubungan;
            $tmp->pnj_provinsi_id       = $r->provinsi;
            $tmp->pnj_kecamatan_id      = $r->kecamatan;
            $tmp->pnj_kota_kode           = $r->kota;
            $tmp->pnj_alamat            = $r->alamat;

            $tmp->created_nip           = $app['kar_nip'];
            $tmp->created_nama          = $app['kar_nama_awal'];
            $tmp->created_ip            = $r->ip();
            $tmp->save();

        });

        return response()->json($transaction);       

    }

    public function save_daftar(Request $r){

        $transaction = DB::connection('daycare')->transaction(function() use($r){

            $app = SistemApp::sistem();
            $tmp = new Ortu();
        

            $tmp->ortu_ayah             = $r->ayah;
            $tmp->ortu_ibu              = $r->ibu;

            $tmp->created_nip   = $app['kar_id'];
            $tmp->created_nama  = $app['kar_nama_awal'];
            $tmp->created_ip    = $r->ip();

            $tmp->save();

        });

        return response()->json($transaction);

    }

    public function view(Request $r){

        $result = array('success'=>false);

        try{

          

           // dd($usia);
            
            $data = DB::connection('daycare')
                            ->table('daftar_tb_ortu AS aa')
                            ->orderby('aa.ortu_id','desc')
                            ->get();


            $data = $data->map(function($value) {

                $value->ayah_usia = Carbon::parse($value->ortu_ayah_tgl_lahir)->age;
                $value->ibu_usia = Carbon::parse($value->ortu_ibu_tgl_lahir)->age;



                if ($value->ortu_ibu_agama_id == null){

                    $value->ibu_agama   =  strtoupper('Kosong') ;

                } else if ($value->ortu_ibu_agama_id != null){

                    $value->ibu_agama   = SistemAgama::where('agama_id',$value->ortu_ayah_agama_id)->first()->agama_nama;

                } else if ($value->ortu_ayah_agama_id == null){

                    $value->ibu_agama   =  strtoupper('Kosong') ;

                } else if ($value->ortu_ayah_agama_id != null){

                    $value->ayah_agama   = SistemAgama::where('agama_id',$value->ortu_ayah_agama_id)->first()->agama_nama;

                } else if ($value->ortu_ayah_peru_id == null){

                    $value->ayah_kerja   =  strtoupper('Kosong') ;

                } else if ($value->ortu_ayah_peru_id != null){

                    $value->ayah_kerja   = Perusahaan::where('peru_id',$value->ortu_ayah_peru_id)->first()->peru_nama;

                } else if ($value->ortu_ibu_peru_id == null){

                    $value->ayah_kerja   =  strtoupper('Kosong') ;

                } else if ($value->ortu_ibu_peru_id != null){

                    $value->ibu_kerja   = Perusahaan::where('peru_id',$value->ortu_ibu_peru_id)->first()->peru_nama;

                }

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

        $data = Ortu::where('ortu_id',$id)->first();

        $result = array();
        $result['data']    = $data;

       return response()->json($result);
    }


}
