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
                $tmp->order_tgl         = Carbon::now()->toDateString();
                $tmp->order_jam         = Carbon::now()->toTimeString();    
                $tmp->order_status      = 'U';
                $tmp->order_total       = str_replace(".", "", $r->total_biaya);
       
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
    public function view(Request $r){

        $result = array('success'=>false);

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

                                    'cc.anak_kode',
                                    'cc.order_status',

                                )    
                                ->leftjoin('dapok_tb_anak AS bb','bb.anak_kode','aa.anak_kode')    
                                ->leftjoin('ctrg_tc_order AS cc','cc.anak_kode','aa.anak_kode')   
                                ->where('aa.member_aktif','Y')        
                                ->orderby('aa.member_id','desc')
                                ->get();

            $data = $data->map(function($value) {

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

                $order = CateringOrder::where('anak_kode',$value->anak_kode)->where('order_status','U')->count();

                if($order > 0) {
                    $value->status_order = '1';
                } else {
                    $value->status_order = '0';
                }

                $detail = CateringOrderDetail::where('anak_kode',$value->anak_kode)->get();
                $value->jumlah_order = CateringOrderDetail::where('anak_kode',$value->anak_kode)->count();
                $value->tagihan_order = CateringOrderDetail::where('anak_kode',$value->anak_kode)->sum('detail_total');
                $value->tagihan_order        = format_rupiah($value->tagihan_order  );



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

    public function edit(Request $r)
    {
        $id = $r->get('id');
        
        $data = CateringOrder::where('order_kode',$id)->first();
        return response()->json($data);
        
    }

    public function delete(Request $r){

        $id = $r->get('id');
        $detail = CateringOrderDetail::where('order_kode',$id)->first();
        $data = CateringOrder::where('order_kode',$id)->delete();

        foreach ($detail as $key => $value) {

            $sql = DB::connection('daycare')
                        ->table('ctrg_tc_order_detail')
                        ->where('anak_kode',$r->anak_kode)
                        ->where('detail_aktif','T')
                        ->update([
                            'order_kode' => $id,
                            'detail_aktif' => 'Y'
                        ]);
        }

        return response()->json($data);

    }


    //------------------------------- PIUTANG VIEW --------------------------------


    public function view_piutang(Request $r){

        $result = array('success'=>false);

        try{

            $tgl_mulai  = $r->get('tgl_mulai');
            $tgl_akhir  = $r->get('tgl_akhir');
            $status     = $r->get('status');


            $tanggal_mulai = $tgl_mulai ? date('Y-m-d', strtotime($tgl_mulai)) : date('Y-m-d');
            $tanggal_akhir = $tgl_akhir ? date('Y-m-d', strtotime($tgl_akhir)) : date('Y-m-d');

            $order_kode = CateringOrder::order_kode();

            $data = DB::connection('daycare')
                        ->table('ctrg_order AS aa')
                        ->where('aa.order_tgl', '>=', $tanggal_mulai)
                        ->where('aa.order_tgl', '<=', $tanggal_akhir)
                        ->where('aa.is_aktif','Y')
                        ->orderby('aa.order_kode','desc')
                        ->get();

            $data2 = DB::connection('daycare')
                        ->table('ctrg_order_detail AS aa')
                        ->leftjoin('ctrg_order AS bb','bb.order_kode','=','aa.order_kode')
                        ->leftjoin('dapok_tb_anak AS cc','cc.anak_kode','=','aa.anak_kode')
                        ->leftjoin('ctrg_menu AS dd','dd.menu_kode','=','aa.menu_kode')
                        ->leftjoin('ctrg_kategori AS ee','ee.kat_id','=','dd.kat_id')
                        ->where('aa.is_aktif','Y')
                        ->orderby('aa.order_kode','desc')
                        ->get();
        
            $data = $data->map(function($value) use($data2) {
 
                $value->total_tampil        = format_rupiah($value->order_total);
                $value->total_piutang       = $value->order_total;
                
                return $value;

            });

            // dd($order_kode);

        } catch (\Exception $e) {
            $result['message'] = $e->getMessage();  
            return response()->json($result);
        }

        $result['success'] = true;
        $result['data'] = $data;
        $result['detail'] = $data2;
        $result['total'] = format_rupiah($data->where('order_status','U')->sum('total_piutang'));

        return response()->json($result);

    }

    public function piutang_detail(Request $r){

        $result = array('success'=>false);

        try{
            
            $id = $r->get('id');

            $order       = CateringOrder::where('order_kode',$id)->first();

            $data = DB::connection('daycare')
                            ->table('ctrg_order_detail AS aa')
                            ->leftjoin('ctrg_order AS bb','bb.order_kode','=','aa.order_kode')
                            ->leftjoin('dapok_tb_anak AS cc','cc.anak_kode','=','aa.anak_kode')
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

    //------------------------------- PIUTANG BAYAR PER KODE ORDER --------------------------------

    public function piutang_bayar(Request $r){

        $transaction = DB::connection('daycare')->transaction(function() use($r){
  
              $app = SistemApp::sistem();
  
              $id = $r->get('id');
 
              $tmp = CateringOrder::where('order_kode',$id)->first();

            //   $tmp->menu_kode = $r->kode;
              $tmp->order_total         = $r->total;
              $tmp->order_bayar         = $r->bayar;
              $tmp->order_status         = 'L';


              $tmp->updated_nip   = $app['kar_id'];
              $tmp->updated_nama  = $app['kar_nama_awal'];
              $tmp->updated_ip    = $r->ip();
            
              $tmp->save();
  
              return true;
          });
  
          return response()->json($transaction);   
    }


}
