<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SistemApp;
use App\Helpers;
use Carbon\Carbon;

use DB;

use App\Models\TarifKategori;

class TarifKategoriController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        
        $app = SistemApp::sistem();
        $menu = SistemApp::OtoritasMenu($app['idu']);
        return view('tarif.kategori.index',compact('app','menu'));
    }

    public function save(Request $r){

        //dd($r);

        $transaction = DB::connection('daycare')->transaction(function() use($r){

            $app = SistemApp::sistem();
            $tmp = new TarifKategori();
            $tmp->kat_nama       = $r->kat_nama;
            $tmp->save();

        });

        return response()->json($transaction);

    }

    public function view(Request $r){

        $result = array('success'=>false);

        try{
            
            $data = TarifKategori::get();

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
        $data = Tarifkategori::where('kat_id',$id)->first();
        return response()->json($data);
    }

    public function aktif(Request $r)
    {
        $transaction = DB::connection('daycare')->transaction(function() use($r){

            $id = $r->get('id');
            $tmp = TarifKategori::where('kat_id',$id)->first();
            $tmp->kat_aktif  = 'Y';
            $tmp->save();

            return true;
        });

        return response()->json($transaction);   
    }
    
    public function nonaktif(Request $r)
    {
        $transaction = DB::connection('daycare')->transaction(function() use($r){

            $id = $r->get('id');
            $tmp = TarifKategori::where('kat_id',$id)->first();
            $tmp->kat_aktif  = 'T';
            $tmp->save();

            return true;
        });

        return response()->json($transaction);   
    }


}
