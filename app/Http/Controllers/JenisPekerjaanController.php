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
use App\Models\PendaftaranWali;
use App\Models\Ortu;
use App\Models\Bayar;
use App\Models\JenisPekerjaan;

class JenisPekerjaanController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    // public function index()
    // {
        
    //     $app = SistemApp::sistem();
    //     $menu = SistemApp::OtoritasMenu($app['idu']);
    //     return view('pendaftaran.baru.index',compact('app','menu'));
    // }

    public function save(Request $r){

        $result = array('success'=>false);

        try {

            $kerja      = JenisPekerjaan::where('kerja_id',$r->id)->first();
     
            if ($kerja != null) {
    
                $data = DB::connection('daycare')->transaction(function() use($r,$kerja){  

                    $kerja_id   = $kerja->kerja_id;
                    $tmp        = JenisPekerjaan::where('kerja_id',$kerja_id)->first();
                    $tmp->kerja_nama  = $r->kerja_nama;
                    $tmp->save();
        
                    return true;
                });

                $status = '1';


            } else {

                $data = DB::connection('daycare')->transaction(function() use($r,$kerja){

                    $tmp = new JenisPekerjaan();
                    $tmp->kerja_nama  = $r->kerja_nama;
                    $tmp->save();
        
                    return true;
                });

                $status = '2';

            }

            //dd($status);

        } catch (\Exception $e) {
            $result['message'] = $e->getMessage();  
            return response()->json($result);
        }

        $result['success'] = true;
        $result['status'] = $status;

        return response()->json($result);

        
    }   

    public function view(Request $r){

        $result = array('success'=>false);

        try{
            
            $data = JenisPekerjaan::orderby('kerja_id','desc')->get();

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
        $data = JenisPekerjaan::where('kerja_id',$id)->first();
        //dd($data);
        return response()->json($data);
    }

    public function aktif(Request $r)
    {
        $transaction = DB::connection('daycare')->transaction(function() use($r){
            $id = $r->get('id');
            $tmp = JenisPekerjaan::where('kerja_id',$id)->first();
            $tmp->aktif  = 'Y';
          
            $tmp->save();

            return true;
        });

        return response()->json($transaction);   
    }
    
    

    public function nonaktif(Request $r)
    {
        $transaction = DB::connection('daycare')->transaction(function() use($r){
            $id = $r->get('id');
            $tmp = JenisPekerjaan::where('kerja_id',$id)->first();
            $tmp->aktif  = 'T';
          
            $tmp->save();

            return true;
        });

        return response()->json($transaction);   
    }
    
}

    
    
    
