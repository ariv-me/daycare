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
use App\Models\Perusahaan;

class PerusahaanController extends Controller
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

            $peru      = Perusahaan::where('peru_id',$r->id)->first();
     
            if ($peru != null) {
    
                $data = DB::connection('mysql')->transaction(function() use($r,$peru){  

                    $peru_id    = $peru->peru_id;
                    $tmp        = Perusahaan::where('peru_id',$peru_id)->first();
                    $tmp->peru_nama            = $r->perusahaan_nama;
                    $tmp->grup_id              = $r->perusahaan_grup;
                    $tmp->peru_alamat    = $r->perusahaan_alamat;
                    $tmp->save();
        
                    return true;
                });

                $status = '1';


            } else {

                $data = DB::connection('mysql')->transaction(function() use($r,$peru){

                    $tmp = new Perusahaan();
                    $tmp->peru_nama            = $r->perusahaan_nama;
                    $tmp->grup_id              = $r->perusahaan_grup;
                    $tmp->peru_alamat           = $r->perusahaan_alamat;
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
            
            $data = DB::connection('daycare')
                    ->table('tb_perusahaan AS aa')
                    ->leftjoin('tb_grup AS bb','bb.grup_id','=','aa.grup_id')
                    ->orderby('bb.grup_id')
                    ->orderby('peru_id','desc')
                    ->get();

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
        $id = strtolower($r->get('id'));
        $data = Perusahaan::where('peru_id',$id)->first();
        return response()->json($data);
    }

    public function aktif(Request $r)
    {
        $transaction = DB::connection('mysql')->transaction(function() use($r){
            $id = $r->get('id');
            $tmp = Perusahaan::where('peru_id',$id)->first();
            $tmp->peru_aktif  = 'Y';
          
            $tmp->save();

            return true;
        });

        return response()->json($transaction);   
    }
    
    public function nonaktif(Request $r)
    {
        $transaction = DB::connection('mysql')->transaction(function() use($r){
            $id = $r->get('id');
            $tmp = Perusahaan::where('peru_id',$id)->first();
            $tmp->peru_aktif  = 'T';
          
            $tmp->save();

            return true;
        });

        return response()->json($transaction);   
    }


}
