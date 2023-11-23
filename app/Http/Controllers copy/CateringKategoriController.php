<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SistemApp;
use App\Helpers;
use Carbon\Carbon;

use DB;


use App\Models\Anak;
use App\Models\Ortu;
use App\Models\CateringMenu;
use App\Models\CateringKategori;
use App\Models\CateringOrder;


class CateringKategoriController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        
        $app = SistemApp::sistem();
        $menu = SistemApp::OtoritasMenu($app['idu']);
        return view('catering.kategori.index',compact('app','menu'));
    }

    public function save(Request $r){

   
        $transaction = DB::connection('daycare')->transaction(function() use($r){

            $app = SistemApp::sistem();
            $tmp = new CateringKategori();

            $tmp->kat_nama      = $r->nama;
            $tmp->save();

        });

        return response()->json($transaction);

    }

    public function view(Request $r){

        $result = array('success'=>false);

        try{
            
            $data = CateringKategori::get();

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
        $data = CateringKategori::where('kat_id',$id)->first();
        return response()->json($data);
    }

    public function update(Request $r){

        $transaction = DB::connection('daycare')->transaction(function() use($r){
  
              $app = SistemApp::sistem();
  
              $id = $r->get('id');
              $tmp = CateringKategori::where('kat_id',$id)->first();

              $tmp->kat_nama = $r->nama;
            
              $tmp->save();
  
              return true;
          });
  
          return response()->json($transaction);   
    }
  
    public function aktif(Request $r){
  
          $transaction = DB::connection('daycare')->transaction(function() use($r){  
  
              $app = SistemApp::sistem();
  
              $id = $r->get('id');
              $tmp = CateringKategori::where('kat_id',$id)->first();
              $tmp->kat_aktif = 'Y';
              $tmp->save();
  
              return true;
          });
  
          return response()->json($transaction);
         
    }
  
    public function nonaktif(Request $r){
  
          $transaction = DB::connection('daycare')->transaction(function() use($r){ 
              
              $app = SistemApp::sistem();
  
              $id = $r->get('id');
              $tmp = CateringKategori::where('kat_id',$id)->first();
              $tmp->kat_aktif = 'T';

              $tmp->save();
  
              return true;
          });
  
          return response()->json($transaction);
    }
  


}
