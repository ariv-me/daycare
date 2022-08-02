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
                $tmp->order_status = 'U';
                $tmp->order_total = str_replace(".", "", $r->total);
       
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
        $id = $r->get('id');
        
        $data = CateringOrder::where('order_kode',$id)->first();
        return response()->json($data);
        
    }

    public function detail(Request $r){

        $result = array('success'=>false);

        try{
            
            $id = $r->get('id');

            $order       = CateringOrder::where('order_kode',$id)->first();

            $data = DB::connection('daycare')
                            ->table('ctrg_order_detail AS aa')
                            ->leftjoin('ctrg_order AS bb','bb.order_kode','=','aa.order_kode')
                            ->leftjoin('tb_anak AS cc','cc.anak_nis','=','aa.anak_nis')
                            ->leftjoin('ctrg_menu AS dd','dd.menu_kode','=','aa.menu_kode')
                            ->leftjoin('ctrg_kategori AS ee','ee.kat_id','=','dd.kat_id')
                            ->where('aa.is_aktif','Y')
                            ->where('aa.order_kode',$id)
                            ->get();
            //dd($data);

            $data = $data->map(function($value) {
 
                $value->harga_tampil        = format_rupiah($value->menu_harga_jual);
                $value->order_kode          = $value->order_kode;
                $value->total_tampil        = terbilang($value->order_total);
                
                return $value;

            });

        } catch (\Exception $e) {
            $result['message'] = $e->getMessage();  
            return response()->json($result);
        }

        $result['success'] = true;
        $result['data'] = $data;

        $result['order_tgl'] = helpers_tgl_indo_panjang($order->order_tgl);
        $result['kode'] = $order->order_kode;
        $result['nama'] = $order->kar_nama;
        $result['usaha'] = $order->usaha_nama;
        $result['terbilang'] = terbilang($order->order_total).' Rupiah';
       

        return response()->json($result);

    }


}
