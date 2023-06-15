<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SistemApp;
use App\Models\SistemApps;
use App\Models\SistemMenuApps;

use App\Helpers;
use Carbon\Carbon;
use PDF;
Use DB;
use QrCode;
use StdClass;

class DataAppController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /*-- APPS --*/
    public function index()
    {
        $app = SistemApp::sistem();
        $menu = SistemApp::OtoritasMenu($app['idu']);
        return view('apps.index',compact('app','menu'));
    }

    public function view(){

        $result = array('success'=>false);

        try {

            $data = DB::connection('daycare')
                        ->table('sistem_ta_apps AS aa')
                        ->orderby('aa.apps_level')
                        ->orderby('aa.apps_jenis')
                        ->orderby('aa.apps_urut')
                        ->get();    
                        
            $data = $data->map(function($value) {

                if ($value->apps_grup == '1') {
                    $value->apps_grup = 'Semua';
                } else if ($value->apps_grup == '2') {
                    $value->apps_grup = 'YSP';
                } else if ($value->apps_grup == '3') {
                    $value->apps_grup = 'SPH';
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

    public function save(Request $r)
    {       

        $app = SistemApp::sistem();
        $idu = $app['idu'];

        $transaction = DB::connection('daycare')->transaction(function() use($r){

            $tmp = new SistemApps();

            $jenis = $r->jenis;

            $tmp->apps_jenis = $r->jenis;

            if (($jenis) == '1') {

                $tmp->apps_nama = $r->nama;
                $tmp->apps_link = '#';

            } else if (($jenis) == '2') {

                $tmp->apps_nama = $r->nama;
                $tmp->apps_link = $r->link;
            }

            $tmp->apps_grup = $r->grup;

            $tmp->save();

            return true;
        });

        return response()->json($transaction);
    }

    public function edit(Request $r){

        $id = $r->get('id');
        $data = SistemApps::where('apps_id',$id)->first();
        return response()->json($data);
    }

    public function update(Request $r){

        $transaction = DB::connection('daycare')->transaction(function() use($r){  
            $id = $r->get('id');
            $tmp = SistemApps::where('apps_id',$id)->first();

            $jenis = $r->jenis;

            $tmp->apps_jenis = $r->jenis;
            $tmp->apps_nama = $r->nama;

            if (($jenis) == '1') {

                $tmp->apps_parent = '';
                $tmp->apps_link = '#';
                $tmp->apps_icon = $r->icon;
                $tmp->apps_level = $r->level;
                $tmp->apps_urut = $r->urut;

            } else if (($jenis) == '2') {

                $tmp->apps_parent = $r->parent;
                $tmp->apps_link = $r->link;
                $tmp->apps_icon = '';
                $tmp->apps_level = $r->level;
                $tmp->apps_urut = $r->urut;
            }

            $tmp->apps_grup = $r->grup;

            $tmp->save();

            return true;
        });

        return response()->json($transaction);
    }

    public function aktif(Request $r){

        $transaction = DB::connection('daycare')->transaction(function() use($r){  
            $id = $r->get('id');
            $tmp = SistemApps::where('apps_id',$id)->first();
            $tmp->apps_aktif = 'Y';
            $tmp->save();

            return true;
        });

        return response()->json($transaction);
    }

    public function nonaktif(Request $r){

        $transaction = DB::connection('daycare')->transaction(function() use($r){  
            $id = $r->get('id');
            $tmp = SistemApps::where('apps_id',$id)->first();
            $tmp->apps_aktif = 'T';
            $tmp->save();

            return true;
        });

        return response()->json($transaction);
    }

    /*-- MENU --*/
    public function menu_index()
    {
        $app = SistemApp::sistem();
        $menu = SistemApp::OtoritasMenu($app['idu']);
        return view('apps.menu.index',compact('app','menu'));
    }

    public function menu_view(){

        $result = array('success'=>false);

        try {

            $data = DB::connection('daycare')
                        ->table('sistem_ta_menu_apps AS aa')
                        ->leftjoin('sistem_ta_apps AS bb','bb.apps_id','=','aa.apps_id')
                        ->leftjoin('sistem_tc_unit AS cc','cc.unit_id','=','aa.unit_id')
                        ->orderby('cc.unit_nama')
                        ->get();        
            
        } catch (\Exception $e) {
            $result['message'] = $e->getMessage();  
            return response()->json($result);
        }

        $result['success'] = true;
        $result['data'] = $data;

        return response()->json($result);
    }

    public function menu_save(Request $r)
    {       

        $app = SistemApp::sistem();
        $idu = $app['idu'];

        $transaction = DB::connection('daycare')->transaction(function() use($r){
            $tmp = new SistemMenuApps();
            $tmp->unit_id = $r->unit;
            $tmp->apps_id = $r->aplikasi;
            $tmp->save();

            return true;
        });

        return response()->json($transaction);
    }

    public function menu_edit(Request $r){

        $id = $r->get('id');
        $data = SistemMenuApps::where('menu_id',$id)->first();
        return response()->json($data);
    }

    public function menu_update(Request $r){

        $transaction = DB::connection('daycare')->transaction(function() use($r){  
            $id = $r->get('id');
            $tmp = SistemMenuApps::where('menu_id',$id)->first();
            $tmp->unit_id = $r->unit;
            $tmp->apps_id = $r->aplikasi;
            $tmp->save();

            return true;
        });

        return response()->json($transaction);
    }

    public function menu_delete(Request $r){
        $id = $r->get('id');
        $data = SistemMenuApps::where('menu_id',$id)->delete();
        return response()->json($data);
    }
}
