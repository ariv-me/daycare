<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SistemApp;
use App\Helpers;
use Carbon\Carbon;

use DB;

use App\Models\Pendaftaran;
use App\Models\DapokOrtu;
use App\Models\Perusahaan;
use App\Models\SistemProvinsi;
use App\Models\SistemKota;
use App\Models\SistemKecamatan;
use App\Models\SistemAgama;

class DapokOrtuController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $app = SistemApp::sistem();
        $menu = SistemApp::OtoritasMenu($app['idu']);
        //return view('ysp_sosial.rumah_singgah.index',compact('app','menu'));
    }


    public function save (Request $r){

        $result = array('success'=>false);

            try {
        
                $app       = SistemApp::sistem();
                $data      = DB::connection('daycare')->transaction(function() use($r,$app){
                
                $tmp = new DapokOrtu();

                $tmp->ortu_ayah               = $r->ayah_nama;
                $tmp->ortu_ayah_nik           = $r->ayah_nik;
                $tmp->ortu_ayah_tgl_lahir     = date('Y-m-d', strtotime($r->ayah_lahir));
                $tmp->ortu_ayah_tmp_lahir     = $r->ayah_tmp_lahir;
                $tmp->ortu_ayah_kerja         = $r->ayah_kerja;
                $tmp->ortu_ayah_pdk_id        = $r->ayah_pdk;
                $tmp->ortu_ayah_peru_id       = $r->ayah_perusahaan;
                $tmp->ortu_ayah_hp            = $r->ayah_hp;
                $tmp->ortu_ayah_wa            = $r->ayah_wa;
                $tmp->ortu_ayah_agama_id      = $r->ayah_agama;

                $tmp->ortu_ibu               = $r->ibu_nama;
                $tmp->ortu_ibu_nik           = $r->ibu_nik;
                $tmp->ortu_ibu_tmp_lahir     = $r->ibu_tmp_lahir;
                $tmp->ortu_ibu_tgl_lahir     = date('Y-m-d', strtotime($r->ibu_lahir));
                $tmp->ortu_ibu_kerja         = $r->ibu_kerja;
                $tmp->ortu_ibu_pdk_id        = $r->ibu_pdk;
                $tmp->ortu_ibu_peru_id       = $r->ibu_perusahaan;
                $tmp->ortu_ibu_hp            = $r->ibu_hp;
                $tmp->ortu_ibu_wa            = $r->ibu_wa;
                $tmp->ortu_ibu_agama_id      = $r->ibu_agama;

                $tmp->provinsi_id            = $r->provinsi;
                $tmp->kota_id                = $r->kota;
                $tmp->kecamatan_id           = $r->kecamatan;
                $tmp->ortu_alamat            = $r->alamat;

                $tmp->created_nip           = $app['kar_nip'];
                $tmp->created_nama          = $app['kar_nama_awal'];
                $tmp->created_ip            = $r->ip();

                //dd($tmp);

                $tmp->save();
    
                return true;
            });

        } catch (\Exception $e) {
            $result['message'] = $e->getMessage();  
            return response()->json($result);
        }
        
        $result['success'] = true;
        return response()->json($result);   


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

            
            $data = DB::connection('daycare')
                            ->table('dapok_tb_ortu AS aa')                        
                            ->orderby('aa.ortu_id','desc')
                            ->get();
                //dd($data);

                $data = $data->map(function($value) {

                    $value->provinsi = ucwords(strtolower(SistemProvinsi::getNamaProvinsi($value->provinsi_id)));
                    $value->kota = ucwords(strtolower(SistemKota::getNamaKota($value->kota_id)));
                    $value->kecamatan = ucwords(strtolower(SistemKecamatan::getNamaKecamatan($value->kecamatan_id)));

                $value->ayah_usia = Carbon::parse($value->ortu_ayah_tgl_lahir)->age;
                $value->ibu_usia = Carbon::parse($value->ortu_ibu_tgl_lahir)->age;
                
                $value->peru_ayah = Perusahaan::where('peru_id',$value->ortu_ayah_peru_id)->first()->peru_nama;
                $value->peru_ibu = Perusahaan::where('peru_id',$value->ortu_ibu_peru_id)->first()->peru_nama;

                
                if ($value->ortu_ibu_agama_id == null){

                    $value->ibu_agama   =  strtoupper('-') ;

                } else if ($value->ortu_ibu_agama_id != null){

                    $value->ibu_agama   = SistemAgama::where('agama_id',$value->ortu_ayah_agama_id)->first()->agama_nama;

                } else if ($value->ortu_ayah_agama_id == null){

                    $value->ibu_agama   =  strtoupper('-') ;

                } else if ($value->ortu_ayah_agama_id != null){

                    $value->ayah_agama   = SistemAgama::where('agama_id',$value->ortu_ayah_agama_id)->first()->agama_nama;

                } else if ($value->ortu_ayah_peru_id == null){

                    $value->ayah_kerja   =  strtoupper('-') ;

                } else if ($value->ortu_ayah_peru_id != null){

                    $value->ayah_kerja   = Perusahaan::where('peru_id',$value->ortu_ayah_peru_id)->first()->peru_nama;

                } else if ($value->ortu_ibu_peru_id == null){

                    $value->ayah_kerja   =  strtoupper('-') ;

                } else if ($value->ortu_ibu_peru_id != null){

                    $value->ibu_kerja   = Perusahaan::where('peru_id',$value->ortu_ibu_peru_id)->first()->peru_nama;

                }

                

                return $value;

            });

           // dd($data);
            
                
                            
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
       
        $data = DapokOrtu::where('ortu_id',$id)->first();

        $result = array();
        $result['data']    = $data;

       return response()->json($result);
    }

    public function update(Request $r){

        $app = SistemApp::sistem();

        $transaction = DB::connection('daycare')->transaction(function() use($r,$app){
  
              $id = $r->get('id');
              //dd($id);
              $tmp = DapokOrtu::where('ortu_id',$id)->first();

              $tmp->ortu_ayah               = $r->ayah_nama;
              $tmp->ortu_ayah_nik           = $r->ayah_nik;
              $tmp->ortu_ayah_tgl_lahir     = date('Y-m-d', strtotime($r->ayah_lahir));
              $tmp->ortu_ayah_tmp_lahir     = $r->ayah_tmp_lahir;
              $tmp->ortu_ayah_kerja         = $r->ayah_kerja;
              $tmp->ortu_ayah_pdk_id        = $r->ayah_pdk;
              $tmp->ortu_ayah_peru_id       = $r->ayah_perusahaan;
              $tmp->ortu_ayah_hp            = $r->ayah_hp;
              $tmp->ortu_ayah_wa            = $r->ayah_wa;
              $tmp->ortu_ayah_agama_id      = $r->ayah_agama;

              $tmp->ortu_ibu               = $r->ibu_nama;
              $tmp->ortu_ibu_nik           = $r->ibu_nik;
              $tmp->ortu_ibu_tmp_lahir     = $r->ibu_tmp_lahir;
              $tmp->ortu_ibu_tgl_lahir     = date('Y-m-d', strtotime($r->ibu_lahir));
              $tmp->ortu_ibu_kerja         = $r->ibu_kerja;
              $tmp->ortu_ibu_pdk_id        = $r->ibu_pdk;
              $tmp->ortu_ibu_peru_id       = $r->ibu_perusahaan;
              $tmp->ortu_ibu_hp            = $r->ibu_hp;
              $tmp->ortu_ibu_wa            = $r->ibu_wa;
              $tmp->ortu_ibu_agama_id      = $r->ibu_agama;

              $tmp->provinsi_id            = $r->provinsi;
              $tmp->kota_id                = $r->kota;
              $tmp->kecamatan_id           = $r->kecamatan;
              $tmp->ortu_alamat            = $r->alamat;

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
            $id = $r->get('id');
            $tmp = DapokOrtu::where('ortu_id',$id)->first();
            $tmp->ortu_aktif  = 'Y';

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
            $tmp = DapokOrtu::where('ortu_id',$id)->first();
            $tmp->ortu_aktif  = 'T';

            $tmp->updated_nip           = $app['kar_nip'];
            $tmp->updated_nama          = $app['kar_nama_awal'];
            $tmp->updated_ip            = $r->ip();
          
            $tmp->save();

            return true;
        });

        return response()->json($transaction);   
    }


}
