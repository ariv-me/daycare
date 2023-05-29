<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SistemApp;
use App\Helpers;
use Carbon\Carbon;

use DB;

use App\Models\DapokAnak;
use App\Models\Perusahaan;
use App\Models\SistemAgama;

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
        //return view('ysp_sosial.rumah_singgah.index',compact('app','menu'));
    }


    public function save (Request $r){

        $result = array('success'=>false);

            try {
        
                $app       = SistemApp::sistem();
                $nis       = DapokAnak::autonumber();
                $data      = DB::connection('daycare')->transaction(function() use($r,$app,$nis){
                
                $tmp = new DapokAnak();

                $tmp->anak_nis           = $nis;
                $tmp->anak_id            = $r->ortu;
                $tmp->pnj_id             = $r->penjemput;
                $tmp->kontak_id          = $r->kontak;
                $tmp->anak_nama          = $r->anak_nama;
                $tmp->anak_tmp_lahir     = $r->anak_tmp_lahir;
                $tmp->anak_tgl_lahir     = date('Y-m-d', strtotime($r->anak_tgl_lahir));
                $tmp->anak_jekel         = $r->anak_jekel;
                $tmp->anak_ke            = $r->anak_ke;
                $tmp->anak_jml_saudara   = $r->anak_saudara;
                $tmp->agama_id           = $r->anak_agama;
                $tmp->anak_berat         = $r->anak_berat;
                $tmp->anak_tinggi        = $r->anak_tinggi;


                $tmp->created_nip        = $app['kar_nip'];
                $tmp->created_nama       = $app['kar_nama_awal'];
                $tmp->created_ip         = $r->ip();

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


    public function view_anak(Request $r){

        $result = array('success'=>false);

        try{

            
            $data = DB::connection('daycare')
                            ->table('dapok_tb_anak AS aa')          
                            ->leftjoin('dapok_tb_ortu AS bb','bb.ortu_id','aa.ortu_id')              
                            ->orderby('aa.anak_id','desc')
                            ->get();

                $data = $data->map(function($value) {

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

    public function edit(Request $r)
    {
        $id = $r->get('id');
       
        $data = DapokAnak::where('anak_id',$id)->first();

        $result = array();
        $result['data']    = $data;

       return response()->json($result);
    }

    public function update(Request $r){

        $app = SistemApp::sistem();

        $transaction = DB::connection('daycare')->transaction(function() use($r,$app){
  
              $id = $r->get('id');
              //dd($id);
              $tmp = DapokAnak::where('anak_id',$id)->first();


              $tmp->anak_id            = $r->ortu;
              $tmp->pnj_id             = $r->penjemput;
              $tmp->kontak_id          = $r->kontak;
              $tmp->anak_nama          = $r->anak_nama;
              $tmp->anak_tmp_lahir     = $r->anak_tmp_lahir;
              $tmp->anak_tgl_lahir     = date('Y-m-d', strtotime($r->anak_tgl_lahir));
              $tmp->anak_jekel         = $r->anak_jekel;
              $tmp->anak_ke            = $r->anak_ke;
              $tmp->anak_jml_saudara   = $r->anak_saudara;
              $tmp->agama_id           = $r->anak_agama;
              $tmp->anak_berat         = $r->anak_berat;
              $tmp->anak_tinggi        = $r->anak_tinggi;

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
            $tmp = DapokAnak::where('anak_id',$id)->first();
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
            $tmp = DapokAnak::where('anak_id',$id)->first();
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
