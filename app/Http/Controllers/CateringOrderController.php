<?php

namespace App\Http\Controllers;

use App\Models\DapokAnak;
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


    //------------------------------- ORDER SAVE --------------------------------

    
    public function view(Request $r){

        $result = array('success'=>false);
        
        $filter_tanggal = date('Y-m-d', strtotime($r->tanggal_akhir));

        try{
            
           
            $data = DB::connection('daycare')
                                ->table('daftar_tc_member AS aa')      
                                ->select(

                                    'aa.member_id',
                                    'aa.anak_kode AS anak',
                                    'aa.tarif_kode',
                                    'aa.grup_kode',
                                    'aa.kat_kode',
                                    'aa.member_tgl',
                                    'aa.member_aktif',
                                    'aa.created_at',
                                    
                                    'bb.anak_kode',
                                    'bb.anak_id',
                                    'bb.anak_aktif',
                                    'bb.anak_nama',
                                    'bb.anak_jekel',
                                    'bb.anak_tgl_lahir',
                                )    
                                ->leftjoin('dapok_tb_anak AS bb','bb.anak_kode','aa.anak_kode')  
                                ->where('aa.member_aktif','Y')     
                                ->orderby('aa.member_id','desc')
                                ->get();

            $data = $data->map(function($value) use($filter_tanggal){

                $value->tgl_member  = format_indo($value->member_tgl);
                $get_date    = Carbon::now()->diff(date('Y-m-d', strtotime($value->member_tgl)));
                $hari_member = $get_date->days;

                    $years = ($hari_member / 365) ; // days / 365 days
                    $years = floor($years); // Remove all decimals
            
                    $month = ($hari_member % 365) / 30.5; // I choose 30.5 for Month (30,31) ;)
                    $month = floor($month); // Remove all decimals

                    $days = ($hari_member % 365) % 30.5; // the rest of days
        
                $value->lama_member = $years.' Tahun, '.$month.' Bulan, '.$days.' Hari';  

                $tgl_lahir          = Carbon::now()->diff($value->anak_tgl_lahir);
                $hari_anak = $tgl_lahir->days;

                    $years = ($hari_anak / 365) ; // days / 365 days
                    $years = floor($years); // Remove all decimals
            
                    $month = ($hari_anak % 365) / 30.5; // I choose 30.5 for Month (30,31) ;)
                    $month = floor($month); // Remove all decimals

                    $days = ($hari_anak % 365) % 30.5; // the rest of days
        
                $value->usia_anak = $years.' Tahun, '.$month.' Bulan, '.$days.' Hari';


                if($value->anak_jekel == 'L'){
                    $value->anak_jekel = 'Laki - Laki';
                }
                else if($value->anak_jekel == 'P'){
                    $value->anak_jekel = 'Perempuan';
                }

                $order = CateringOrder::where('anak_kode',$value->anak_kode)->where('order_status','U')->where('order_tgl',$filter_tanggal)->where('order_close','T')->count();
                $kode = CateringOrder::where('anak_kode',$value->anak_kode)->where('order_status','U')->where('order_tgl',$filter_tanggal)->first();
                // dd($kode->order_kode);
                if($kode != null){
                    $value->order_kode = $kode->order_kode;
                } else {
                    $value->order_kode = '';
                }

                if($order > 0) {
                    $value->status_order = '1';
                } else {
                    $value->status_order = '0';
                }

                $detail = CateringOrderDetail::where('anak_kode',$value->anak_kode)->get();
                $value->jumlah_order  = CateringOrderDetail::where('anak_kode',$value->anak_kode)->where('detail_tgl',$filter_tanggal)->where('order_kode','!=','null')->where('detail_status','O')->count();
                $value->tagihan_order = CateringOrderDetail::where('anak_kode',$value->anak_kode)->where('detail_tgl',$filter_tanggal)->where('order_kode','!=','null')->where('detail_status','O')->sum('detail_total');
                $value->tagihan_order = format_rupiah($value->tagihan_order  );
                

                return $value;

            });
                    

        } catch (\Exception $e) {
            $result['message'] = $e->getMessage();  
            return response()->json($result);
        }

        $result['success']       = true;
        $result['data']          = $data;
        $result['total_anak']    = CateringOrder::where('order_close','T')->where('is_aktif','Y')->where('order_tgl',$filter_tanggal)->count();
        $result['total_order']   = CateringOrderDetail::where('detail_aktif','Y')->where('detail_tgl',$filter_tanggal)->sum('detail_qty');
        $result['total_tagihan'] = format_rupiah(CateringOrder::where('order_close','T')->where('is_aktif','Y')->where('order_tgl',$filter_tanggal)->sum('order_total'));


        return response()->json($result);

    }


    public function save(Request $r){


        $result = array('success'=>false);

        try {

            $order_kode  = CateringOrder::order_kode();

            $transaction = DB::connection('daycare')->transaction(function() use($r,$order_kode){
    
                $app        = SistemApp::sistem();

                /*-- SAVE --*/
    
                $tmp = new CateringOrder();
                
                $tmp->order_kode        = $order_kode;
                $tmp->anak_kode         = $r->anak_kode;
                $tmp->order_tgl         = date('Y-m-d', strtotime($r->tanggal));
                $tmp->order_jam         = Carbon::now()->toTimeString();    
                $tmp->order_status      = 'U';
                $tmp->order_total       = str_replace(".", "", $r->total_biaya);
                $tmp->order_grand_total = str_replace(".", "", $r->total_biaya);
       
                $tmp->created_nip       = $app['kar_nip'];
                $tmp->created_nama      = $app['kar_nama_awal'];
                $tmp->created_ip        = $r->ip();
                
                $detail = CateringOrderDetail::where('order_kode',null)->where('anak_kode',$r->anak_kode)->where('detail_status','O')->where('detail_aktif','T')->get();
                //dd($detail);
    
                foreach ($detail as $key => $value) {
    
                    /*-- DETAIL UPDATE --*/
    
                    $sql = DB::connection('daycare')
                                ->table('ctrg_tc_order_detail')
                                ->where('anak_kode',$r->anak_kode)
                                ->where('detail_aktif','T')
                                ->update([
                                    'order_kode' => $order_kode,
                                    'detail_aktif' => 'Y'
                                ]);
                }

                $tmp->save();
    
    
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

    public function update(Request $r) {

        $app = SistemApp::sistem();
        $tmp = CateringOrder::where('order_kode',$r->order_kode)->where('anak_kode',$r->anak_kode)->first();
                
        $tmp->order_kode        = $r->order_kode;
        $tmp->anak_kode         = $r->anak_kode;
        $tmp->order_jam         = Carbon::now()->toTimeString();    
        $tmp->order_status      = 'U';
        $tmp->order_total       = str_replace(".", "", $r->total_biaya);

        $tmp->created_nip       = $app['kar_nip'];
        $tmp->created_nama      = $app['kar_nama_awal'];
        $tmp->created_ip        = $r->ip();

        $tmp->save();
    
        return true;
        
    }

    public function edit(Request $r)
    {
       
        $kode = $r->get('id');
        $data = DB::connection('daycare')
                                ->table('ctrg_tc_order AS aa')      
                                ->leftjoin('dapok_tb_anak AS bb','bb.anak_kode','aa.anak_kode')    
                                ->where('aa.order_kode', $kode)
                                ->first();
                                
        return response()->json($data);
        
    }

    public function delete(Request $r){
     
        $data = DB::connection('daycare')->transaction(function () use($r){

            $detail = CateringOrderDetail::where('anak_kode',$r->anak_kode)->delete();
            $data = CateringOrder::where('order_kode',$r->order_kode)->where('anak_kode',$r->anak_kode)->delete();
    
            return true;

        });

        return response()->json($data);

    }


}
