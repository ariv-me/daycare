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
use App\Models\CateringOrderDetail; 


class CateringOrderController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        
        $app = SistemApp::sistem();
        $menu = SistemApp::OtoritasMenu($app['idu']);
        return view('catering.order.index',compact('app','menu'));
    }

    public function save(Request $r){


        $result = array('success'=>false);

        try {


            $order_kode  = CateringOrder::order_kode();

            $transaction = DB::connection('daycare')->transaction(function() use($r,$order_kode){
    
                $app        = SistemApp::sistem();
                
                /*-- SAVE --*/
    
                $tmp = new CateringOrder();


                $tmp->order_kode = $order_kode;
                $tmp->order_tgl = Carbon::now()->toDateString();
                $tmp->order_jam = Carbon::now()->toTimeString();    
       
                $tmp->kar_id            = $app['kar_id'];
                $tmp->kar_nama          = $app['kar_nama_awal'];
                $tmp->usaha_id          = $app['usaha_id'];
                $tmp->usaha_nama        = $app['usaha_nama'];
                $tmp->created_ip        = $r->ip();
    
                $tmp->save();
    
                $detail = CateringOrderDetail::where('kar_id',$app['kar_id'])->where('is_aktif','T')->get();

                //dd($detail);
    
                foreach ($detail as $key => $value) {
    
                    /*-- DETAIL UPDATE --*/
    
                    $sql = DB::connection('daycare')
                                ->table('ctrg_order_detail')
                                ->where('kar_id',$app['kar_id'])
                                ->where('is_aktif','T')
                                ->update([
                                    'order_kode' => $order_kode,
                                    'is_aktif' => 'Y'
                                ]);
                }
    
                return true;
    
            });


        } catch (\Exception $e) {
            $result['message'] = $e->getMessage();  
            return response()->json($result);
        }
        
        $result['success'] = true;
        $result['invoice'] = $order_kode;

        return response()->json($result);   

    }
    public function view(Request $r){

        $result = array('success'=>false);

        try{
            
            $data = Anak::get();

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
        $data = Anak::where('anak_nis',$id)->first();
        return response()->json($data);
    }


}
