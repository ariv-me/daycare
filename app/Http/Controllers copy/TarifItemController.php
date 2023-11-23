<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SistemApp;
use App\Models\TarifItem;
use App\Helpers;
use Carbon\Carbon;

use DB;


class TarifItemController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        
        $app = SistemApp::sistem();
        $menu = SistemApp::OtoritasMenu($app['idu']);
        return view('tarif.item.index',compact('app','menu'));
    }

    public function save(Request $r){

        $transaction = DB::connection('daycare')->transaction(function() use($r){

            $app = SistemApp::sistem();
            $tmp = new TarifItem();
            $tmp->item_nama    = $r->nama;
            $tmp->item_nominal = str_replace(".", "", $r->nominal);

            $tmp->created_nip         = $app['kar_nip'];
            $tmp->created_nama        = $app['kar_nama_awal'];;
            $tmp->created_ip          = $r->ip();

            $tmp->save();

        });

        return response()->json($transaction);

    }

    public function view(Request $r){

        $result = array('success'=>false);

        try{
            
            $data = TarifItem::orderby('item_id','desc')->get();

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
        $data = TarifItem::where('item_id',$id)->first();
        return response()->json($data);
    }

    public function update(Request $r){

        $transaction = DB::connection('daycare')->transaction(function() use($r){
  
              $id = $r->get('id');
              $tmp = TarifItem::where('item_id',$id)->first();

              $tmp->item_nama = $r->nama;
              $tmp->item_nominal = str_replace(".", "", $r->nominal);

              $tmp->updated_nip         = $app['kar_nip'];
              $tmp->updated_nama        = $app['kar_nama_awal'];;
              $tmp->updated_ip          = $r->ip();

              $tmp->save();
  
              return true;
          });
  
          return response()->json($transaction);   
    }

    public function aktif(Request $r)
    {
        $transaction = DB::connection('daycare')->transaction(function() use($r){
            $id = $r->get('id');
            $tmp = TarifItem::where('item_id',$id)->first();
            $tmp->item_aktif  = 'Y';

            $tmp->updated_nip         = $app['kar_nip'];
            $tmp->updated_nama        = $app['kar_nama_awal'];;
            $tmp->updated_ip          = $r->ip();
          
            $tmp->save();

            return true;
        });

        return response()->json($transaction);   
    }
    
    public function nonaktif(Request $r)
    {
        $transaction = DB::connection('daycare')->transaction(function() use($r){
            $id = $r->get('id');
            $tmp = TarifItem::where('item_id',$id)->first();
            $tmp->item_aktif  = 'T';

            $tmp->updated_nip         = $app['kar_nip'];
            $tmp->updated_nama        = $app['kar_nama_awal'];;
            $tmp->updated_ip          = $r->ip();
          
            $tmp->save();

            return true;
        });

        return response()->json($transaction);   
    }


}
