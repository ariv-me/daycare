<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SistemApp;
use App\Helpers;
use Carbon\Carbon;

use DB;

use App\Models\Pendaftaran;
use App\Models\DapokPenjemput;
use App\Models\Perusahaan;
use App\Models\SistemProvinsi;
use App\Models\SistemKota;
use App\Models\SistemKecamatan;
use App\Models\SistemAgama;
use App\Models\SistemHubungan;

class DapokPenjemputController extends Controller
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
            $tmp = new DapokPenjemput();
            $tmp->pnj_nama              = $r->penjemput_nama;
            $tmp->pnj_nik               = $r->penjemput_nik;
            $tmp->pnj_tgl_lahir         = date('Y-m-d', strtotime($r->penjemput_lahir));
            $tmp->pnj_tmp_lahir         = $r->penjemput_tmp_lahir;
            $tmp->pnj_kerja_id          = $r->penjemput_kerja;
            $tmp->pnj_peru           = $r->penjemput_perusahaan;
            $tmp->pnj_hp                = $r->penjemput_hp;
            $tmp->pnj_wa                = $r->penjemput_wa;
            $tmp->pnj_agama_id          = $r->penjemput_agama;
            $tmp->pnj_pdk_id            = $r->penjemput_pdk;
            $tmp->pnj_jekel             = $r->penjemput_jekel;
            $tmp->pnj_hub_id            = $r->penjemput_hubungan;
            $tmp->provinsi_id       = $r->provinsi;
            $tmp->kecamatan_id      = $r->kecamatan;
            $tmp->kota_id           = $r->kota;
            $tmp->pnj_alamat            = $r->alamat;

            $tmp->created_nip           = $app['kar_nip'];
            $tmp->created_nama          = $app['kar_nama_awal'];
            $tmp->created_ip            = $r->ip();

            //dd($tmp);
            $tmp->save();

        });

        return response()->json($transaction);       

    }


    public function view_pnj(Request $r){

        $result = array('success'=>false);

        try{

            
            $data = DB::connection('daycare')
                            ->table('dapok_tb_penjemput AS aa')                        
                            ->orderby('aa.pnj_id','desc')
                            ->get();
                //dd($data);

                $data = $data->map(function($value) {

                    $value->provinsi    = ucwords(strtolower(SistemProvinsi::getNamaProvinsi($value->provinsi_id)));
                    $value->kota        = ucwords(strtolower(SistemKota::getNamaKota($value->kota_id)));
                    $value->kecamatan   = ucwords(strtolower(SistemKecamatan::getNamaKecamatan($value->kecamatan_id)));

                    $value->pnj_usia    = Carbon::parse($value->pnj_tgl_lahir)->age;
                    $value->pnj_agama   = SistemAgama::where('agama_id',$value->pnj_agama_id)->first()->agama_nama;
                    $value->pnj_hubungan= SistemHubungan::where('hub_id',$value->pnj_hub_id)->first()->hub_nama;
                    
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
       
        $data = DapokPenjemput::where('pnj_id',$id)->first();

        $result = array();
        $result['data']    = $data;

       return response()->json($result);
    }

    public function update(Request $r){

        $app = SistemApp::sistem();

        $transaction = DB::connection('daycare')->transaction(function() use($r,$app){
  
              $id = $r->get('id');
              //dd($id);
              $tmp = DapokPenjemput::where('pnj_id',$id)->first();

              $tmp->pnj_nama              = $r->penjemput_nama;
              $tmp->pnj_nik               = $r->penjemput_nik;
              $tmp->pnj_tgl_lahir         = date('Y-m-d', strtotime($r->penjemput_lahir));
              $tmp->pnj_tmp_lahir         = $r->penjemput_tmp_lahir;
              $tmp->pnj_kerja_id          = $r->penjemput_kerja;
              $tmp->pnj_peru           = $r->penjemput_perusahaan;
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
            $tmp = DapokPenjemput::where('pnj_id',$id)->first();
            $tmp->pnj_aktif  = 'Y';

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
            $id = $r->get('id');
            $tmp = DapokPenjemput::where('pnj_id',$id)->first();
            $tmp->pnj_aktif  = 'T';

            $tmp->updated_nip           = $app['kar_nip'];
            $tmp->updated_nama          = $app['kar_nama_awal'];
            $tmp->updated_ip            = $r->ip();
          
            $tmp->save();

            return true;
        });

        return response()->json($transaction);   
    }


}
