<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SistemApp;
use App\Helpers;
use Carbon\Carbon;

use DB;

use App\Models\DapokAnak;
use App\Models\SistemAgama;
use App\Models\SistemProvinsi;
use App\Models\SistemKota;
use App\Models\SistemKecamatan;

class DapokAnakController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $app = SistemApp::sistem();
        $menu = SistemApp::OtoritasMenu($app['idu']);
        return view('dapok.anak.index',compact('app','menu'));
    }


    public function save (Request $r){

        $result = array('success'=>false);

            try {
        
                $app       = SistemApp::sistem();
                $nis       = DapokAnak::autonumber();
                $data      = DB::connection('daycare')->transaction(function() use($r,$app,$nis){
                
                $tmp = new DapokAnak();

                $tmp->anak_kode          = $nis;
                $tmp->ortu_kode            = $r->ortu;
                $tmp->pnj_kode             = $r->penjemput;
                $tmp->anak_nama          = $r->nama;
                $tmp->anak_tmp_lahir     = $r->tmp_lahir;
                $tmp->anak_tgl_lahir     = date('Y-m-d', strtotime($r->tgl_lahir));
                $tmp->anak_jekel         = $r->jekel;
                $tmp->anak_ke            = $r->anak_ke;
                $tmp->anak_jml_saudara   = $r->saudara;
                $tmp->agama_id           = $r->agama;
                $tmp->anak_berat         = $r->berat;
                $tmp->anak_tinggi        = $r->tinggi;

                $tmp->created_nip        = $app['kar_nip'];
                $tmp->created_nama       = $app['kar_nama_awal'];
                $tmp->created_ip         = $r->ip();

                

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


    public function view(Request $r){

        $result = array('success'=>false);

        try{

            
            $data = DB::connection('daycare')
                            ->table('dapok_tb_anak AS aa')          
                            ->leftjoin('dapok_tb_ortu AS bb','bb.ortu_kode','aa.ortu_kode')              
                            ->leftjoin('dapok_tb_penjemput AS cc','cc.pnj_kode','aa.pnj_kode')                
                            ->orderby('aa.anak_kode','desc')
                            ->get();
        
                $data = $data->map(function($value) {

               // $value->provinsi = ucwords(strtolower(SistemProvinsi::getNamaProvinsi($value->prov_kode)));
                // $value->kota = ucwords(strtolower(SistemKota::getNamaKota($value->kota_kode)));
                // $value->kecamatan = ucwords(strtolower(SistemKecamatan::getNamaKecamatan($value->kec_kode)));

                $value->tgl_lahir = format_indo($value->anak_tgl_lahir);
                $value->usia = Carbon::parse($value->anak_tgl_lahir)->age;


                if($value->anak_jekel == 'L'){
                    $value->anak_jekel = 'Laki - Laki';
                }
                else if($value->anak_jekel == 'P'){
                    $value->anak_jekel = 'Perempuan';
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

    public function view_anak(Request $r){

        $result = array('success'=>false);

        try{

        $kode = $r->get('kode');
        $data = DB::connection('daycare')
                        ->table('dapok_tb_anak AS aa')
                        ->leftjoin('daftar_tc_member AS bb','bb.anak_kode','=','aa.anak_kode')
                        ->leftjoin('dapok_tb_ortu AS cc','cc.ortu_kode','=','aa.ortu_kode')
                        ->where('aa.ortu_kode',$kode)
                        ->orderby('aa.anak_kode','desc')
                        ->get();

        $data = $data->map(function($value) {

            $value->anak_tgl_lahir = format_indo($value->anak_tgl_lahir);

            if($value->anak_jekel == 'L'){
                $value->anak_jekel = 'Laki - Laki';
            }
            else if($value->anak_jekel == 'P'){
                $value->anak_jekel = 'Perempuan';
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

    public function view_anak_tagihan(Request $r)
    {
        $result = array('success'=>false);

        try{

        $kode = $r->get('kode');
        $data = DB::connection('daycare')
                        ->table('dapok_tb_anak AS aa')
                        ->leftjoin('daftar_tc_member AS bb','bb.anak_kode','=','aa.anak_kode')
                        ->leftjoin('dapok_tb_ortu AS cc','cc.ortu_kode','=','aa.ortu_kode')
                        ->where('aa.anak_kode',$kode)
                        ->orderby('aa.anak_kode','desc')
                        ->first();

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
        $result = array('success'=>false);

        try{

        $kode = $r->get('id');
        $data = DB::connection('daycare')
                        ->table('dapok_tb_anak AS aa')
                        // ->leftjoin('daftar_tc_member AS bb','bb.anak_kode','=','aa.anak_kode')
                        // ->leftjoin('dapok_tb_ortu AS cc','cc.ortu_kode','=','aa.ortu_kode')
                        ->where('aa.anak_kode',$kode)
                        ->orderby('aa.anak_kode','desc')
                        ->first();
        

        } catch (\Exception $e) {
            $result['message'] = $e->getMessage();  
            return response()->json($result);
        }

        $result['success'] = true;
        $result['data'] = $data;

        return response()->json($result);


    }

    public function update(Request $r){

        $app = SistemApp::sistem();

        $transaction = DB::connection('daycare')->transaction(function() use($r,$app){
  
              $id = $r->get('id');
              $tmp = DapokAnak::where('anak_kode',$id)->first();

              $tmp->ortu_kode            = $r->ortu;
              $tmp->pnj_kode             = $r->penjemput;
              $tmp->anak_nama          = $r->nama;
              $tmp->anak_tmp_lahir     = $r->tmp_lahir;
              $tmp->anak_tgl_lahir     = date('Y-m-d', strtotime($r->tgl_lahir));
              $tmp->anak_jekel         = $r->jekel;
              $tmp->anak_ke            = $r->anak_ke;
              $tmp->anak_jml_saudara   = $r->saudara;
              $tmp->agama_id           = $r->agama;
              $tmp->anak_berat         = $r->berat;
              $tmp->anak_tinggi        = $r->tinggi;

              $tmp->updated_nip           = $app['kar_nip'];
              $tmp->updated_nama          = $app['kar_nama_awal'];
              $tmp->updated_ip            = $r->ip();

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
            $tmp = DapokAnak::where('anak_kode',$id)->first();
            $tmp->anak_aktif  = 'Y';

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
            $tmp = DapokAnak::where('anak_kode',$id)->first();
            $tmp->anak_aktif  = 'T';

            $tmp->updated_nip           = $app['kar_nip'];
            $tmp->updated_nama          = $app['kar_nama_awal'];
            $tmp->updated_ip            = $r->ip();

            $tmp->save();

            return true;
        });

        return response()->json($transaction);   
    }


}
