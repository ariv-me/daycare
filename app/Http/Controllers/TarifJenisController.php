<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SistemApp;
use App\Models\TarifJenis;
use App\Helpers;
use Carbon\Carbon;

use DB;


class TarifJenisController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        
        $app = SistemApp::sistem();
        $menu = SistemApp::OtoritasMenu($app['idu']);
        return view('tarif.jenis.index',compact('app','menu'));
    }

    public function save(Request $r){

        $transaction = DB::connection('daycare')->transaction(function() use($r){

            $app = SistemApp::sistem();
            $tmp = new TarifJenis();
            $tmp->jenis_nama    = $r->nama;
            $tmp->save();

        });

        return response()->json($transaction);

    }

    public function view(Request $r){

        $result = array('success'=>false);

        try{
            
            $data = TarifJenis::orderby('jenis_id','desc')->get();

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
        $data = TarifJenis::where('jenis_id',$id)->first();
        return response()->json($data);
    }

    public function update(Request $r){

        $transaction = DB::connection('daycare')->transaction(function() use($r){
  
              $id = $r->get('id');
              $tmp = TarifJenis::where('jenis_id',$id)->first();

              $tmp->jenis_nama = $r->nama;
              $tmp->save();
  
              return true;
          });
  
          return response()->json($transaction);   
    }

    public function aktif(Request $r)
    {
        $transaction = DB::connection('daycare')->transaction(function() use($r){
            $id = $r->get('id');
            $tmp = TarifJenis::where('jenis_id',$id)->first();
            $tmp->jenis_aktif  = 'Y';
          
            $tmp->save();

            return true;
        });

        return response()->json($transaction);   
    }
    
    public function nonaktif(Request $r)
    {
        $transaction = DB::connection('daycare')->transaction(function() use($r){
            $id = $r->get('id');
            $tmp = TarifJenis::where('jenis_id',$id)->first();
            $tmp->jenis_aktif  = 'T';
          
            $tmp->save();

            return true;
        });

        return response()->json($transaction);   
    }


}
