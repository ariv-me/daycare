<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SistemApp;
use App\Helpers;
use Carbon\Carbon;

use DB;

use App\Models\Pendaftaran;
use App\Models\DapokKontakDarurat;
use App\Models\Perusahaan;
use App\Models\SistemProvinsi;
use App\Models\SistemKota;
use App\Models\SistemKecamatan;
use App\Models\SistemAgama;
use App\Models\SistemHubungan;

class DapokKontakDaruratController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $app = SistemApp::sistem();
        $menu = SistemApp::OtoritasMenu($app['idu']);
    }


    public function save (Request $r){

        $transaction = DB::connection('daycare')->transaction(function() use($r){

            $app = SistemApp::sistem();
            $tmp = new DapokKontakDarurat();
            $tmp->kontak_nama       = $r->kontak_nama;
            $tmp->kontak_nik        = $r->kontak_nik;
            $tmp->kontak_hp         = $r->kontak_hp;
            $tmp->kontak_jekel      = $r->kontak_jekel;

            $tmp->provinsi_id       = $r->provinsi;
            $tmp->kecamatan_id      = $r->kecamatan;
            $tmp->kota_id           = $r->kota;
            $tmp->kontak_alamat     = $r->alamat;

            $tmp->created_nip       = $app['kar_nip'];
            $tmp->created_nama      = $app['kar_nama_awal'];
            $tmp->created_ip        = $r->ip();

            dd($tmp);
            $tmp->save();

        });

        return response()->json($transaction);       

    }


    public function view(Request $r){

        $result = array('success'=>false);

        try{

            
            $data = DB::connection('daycare')
                            ->table('dapok_tb_kontak AS aa')                        
                            ->orderby('aa.kontak_id','desc')
                            ->get();
                //dd($data);

                $data = $data->map(function($value) {

                    if ($value->kontak_jekel == 'L'){
                        $value->kontak_jekel = 'Laki-Laki';
                    } else {
                        $value->kontak_jekel = 'Perempuan';
                    }
                    
                return $value;

            });         
             
            //dd($data);
                            
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
       
        $data = DapokKontakDarurat::where('kontak_id',$id)->first();

        $result = array();
        $result['data']    = $data;

       return response()->json($result);
    }

    public function update(Request $r){

        $app = SistemApp::sistem();

        $transaction = DB::connection('daycare')->transaction(function() use($r,$app){
  
              $id = $r->get('id');
              //dd($id);
              $tmp = DapokKontakDarurat::where('kontak_id',$id)->first();

              $tmp->pnj_nama              = $r->penjemput_nama;
              $tmp->pnj_nik               = $r->penjemput_nik;
              $tmp->pnj_tgl_lahir         = date('Y-m-d', strtotime($r->penjemput_lahir));
              $tmp->pnj_tmp_lahir         = $r->penjemput_tmp_lahir;
              $tmp->pnj_kerja_id          = $r->penjemput_kerja;
              $tmp->pnj_peru_id           = $r->penjemput_perusahaan;
              $tmp->pnj_hp                = $r->penjemput_hp;
              $tmp->pnj_wa                = $r->penjemput_wa;
              $tmp->pnj_agama_id          = $r->penjemput_agama;
              $tmp->pnj_pdk_id            = $r->penjemput_pdk;
              $tmp->pnj_jekel             = $r->penjemput_jekel;
              $tmp->pnj_hub_id            = $r->penjemput_hubungan;
              $tmp->provinsi_id           = $r->provinsi;
              $tmp->kecamatan_id          = $r->kecamatan;
              $tmp->kota_id               = $r->kota;
              $tmp->pnj_alamat            = $r->alamat;

              $tmp->updated_nip           = $app['kar_nip'];
              $tmp->updated_nama          = $app['kar_nama_awal'];
              $tmp->updated_ip            = $r->ip();

              //dd($tmp);

              $tmp->save();
  
              return true;
          });
  
          return response()->json($transaction);   
    }

    public function aktif(Request $r)
    {
        $transaction = DB::connection('daycare')->transaction(function() use($r){
            $app = SistemApp::sistem();
            $id  = $r->get('id');
            $tmp = DapokKontakDarurat::where('kontak_id',$id)->first();
            $tmp->kontak_aktif  = 'Y';

            $tmp->updated_nip           = $app['kar_nip'];
            $tmp->updated_nama          = $app['kar_nama_awal'];
            $tmp->updated_ip            = $r->ip();
          
            $tmp->save();

            return true;
        });

        return response()->json($transaction);   
    }   

    public function nonaktif(Request $r)
    {
        $transaction = DB::connection('daycare')->transaction(function() use($r){
            $app = SistemApp::sistem();
            $id  = $r->get('id');
            $tmp = DapokKontakDarurat::where('kontak_id',$id)->first();
            $tmp->kontak_aktif  = 'T';

            $tmp->updated_nip           = $app['kar_nip'];
            $tmp->updated_nama          = $app['kar_nama_awal'];
            $tmp->updated_ip            = $r->ip();
          
            $tmp->save();

            return true;
        });

        return response()->json($transaction);   
    }


}
