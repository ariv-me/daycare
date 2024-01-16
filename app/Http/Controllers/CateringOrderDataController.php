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
use App\Models\CateringMenuItem;
use App\Models\HCISKaryawan;


class CateringOrderDataController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        
        $app = SistemApp::sistem();
        $menu = SistemApp::OtoritasMenu($app['idu']);
        return view('catering.orderan.index',compact('app','menu'));
    }


    public function save(Request $r){

        $app       = SistemApp::sistem();
        $kode = $r->kode;

        $menu      = CateringMenu::get()->where('menu_kode',$r->kode)->first();


        $transaction = DB::connection('daycare')->transaction(function() use($r,$menu,$app){

            /*-- SAVE --*/
            $tmp = new CateringOrderDetail();

            $diskon = 0;
            $qty   = 1;

            $tmp->anak_kode          = $r->anak;
            $tmp->menu_kode         = $menu->menu_kode;
            $tmp->detail_tgl        = Carbon::now()->toDateString();
            $tmp->detail_jam        = Carbon::now()->toTimeString();
            $tmp->detail_qty        = $qty;

            $tmp->detail_harga      = $menu->menu_harga;
            $tmp->detail_harga_jual = $menu->menu_harga_jual;
            $tmp->detail_jadwal     = $r->jadwal;


            /*-- DISKON --*/

            $tmp->detail_diskon          = $diskon;
            $tmp->detail_diskon_rupiah   = ($diskon/100) * ($menu->detail_harga_jual * $qty);
            $tmp->detail_subtotal        = $menu->menu_harga_jual * $qty;
            $tmp->detail_subtotal_diskon = ($menu->menu_harga_jual * $qty) - ($diskon/100) * ($menu->menu_harga_jual * $qty) ;
            
            $tmp->kar_id            = $app['kar_id'];
            $tmp->kar_nama          = $app['kar_nama_awal'];
            $tmp->usaha_id          = $app['usaha_id'];
            $tmp->usaha_nama        = $app['usaha_nama'];
            $tmp->created_ip        = $r->ip();


            $tmp->save();

            return true;

        });

        return response()->json($transaction);

    }

    public function view(Request $r){

        $result = array('success'=>false);
        
        $filter_tanggal = date('Y-m-d', strtotime($r->tanggal));

        try{
            
           
            $data = DB::connection('daycare')
                                ->table('ctrg_tc_order_detail AS aa')      
                                ->select(
                                  
                                    'bb.anak_kode',
                                    'bb.anak_id',
                                    'bb.anak_aktif',
                                    'bb.anak_nama',
                                    'bb.anak_jekel',
                                    'bb.anak_tgl_lahir',

                                    'aa.menu_kode',
                                    'aa.order_kode',
                                    'aa.menu_kode',
                                    'aa.detail_jam',
                                    'aa.detail_tgl',
                                    'aa.detail_qty',
                                    'aa.detail_harga',
                                    'aa.detail_total',
                                    'aa.detail_status',
                                    'aa.detail_id',

                                    'dd.menu_kode',
                                    'dd.menu_nama',
                                    
                                    'ee.kat_id',
                                    'ee.kat_nama',
                                )    
                                ->leftjoin('dapok_tb_anak AS bb','bb.anak_kode','aa.anak_kode')  
                                ->leftjoin('ctrg_tb_menu AS dd','dd.menu_kode','aa.menu_kode')  
                                ->leftjoin('ctrg_ta_kategori AS ee','ee.kat_id','dd.kat_id')  
                                ->where('aa.detail_aktif','Y')     
                                ->where('aa.detail_status','O')     
                                ->where('aa.detail_tgl', $filter_tanggal)
                                ->orderby('aa.detail_id','desc')
                                ->get();

           

            $data = $data->map(function($value) use($filter_tanggal){

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

                $value->detail_harga = format_rupiah($value->detail_harga);
                $value->detail_total = format_rupiah($value->detail_total);

                return $value;

            });
                    

        } catch (\Exception $e) {
            $result['message'] = $e->getMessage();  
            return response()->json($result);
        }

        $result['success']       = true;
        $result['data']          = $data;
        $result['total_anak']    = CateringOrder::where('order_close','T')->where('is_aktif','Y')->where('order_tgl',$filter_tanggal)->count();
        $result['total_order']   = CateringOrderDetail::where('detail_aktif','Y')->where('detail_status','O')->where('detail_tgl',$filter_tanggal)->sum('detail_qty');
        $result['total_tagihan'] = format_rupiah(CateringOrderDetail::where('detail_aktif','Y')->where('detail_status','O')->where('detail_tgl',$filter_tanggal)->sum('detail_total') );
      

        return response()->json($result);

    }
    public function view_terima(Request $r){

        $result = array('success'=>false);
        
        $filter_tanggal = date('Y-m-d', strtotime($r->tanggal));

        try{
            
           
            $data = DB::connection('daycare')
                                ->table('ctrg_tc_order_detail AS aa')      
                                ->select(
                                  
                                    'bb.anak_kode',
                                    'bb.anak_id',
                                    'bb.anak_aktif',
                                    'bb.anak_nama',
                                    'bb.anak_jekel',
                                    'bb.anak_tgl_lahir',

                                    'aa.menu_kode',
                                    'aa.order_kode',
                                    'aa.menu_kode',
                                    'aa.detail_jam',
                                    'aa.detail_tgl',
                                    'aa.detail_qty',
                                    'aa.detail_harga',
                                    'aa.detail_total',
                                    'aa.detail_status',
                                    'aa.detail_id',

                                    'dd.menu_kode',
                                    'dd.menu_nama',
                                    
                                    'ee.kat_id',
                                    'ee.kat_nama',
                                )    
                                ->leftjoin('dapok_tb_anak AS bb','bb.anak_kode','aa.anak_kode')  
                                ->leftjoin('ctrg_tb_menu AS dd','dd.menu_kode','aa.menu_kode')  
                                ->leftjoin('ctrg_ta_kategori AS ee','ee.kat_id','dd.kat_id')  
                                ->where('aa.detail_aktif','Y')     
                                ->where('aa.detail_status','C')     
                                ->where('aa.detail_tgl', $filter_tanggal)
                                ->orderby('aa.detail_id','desc')
                                ->get();

            $data = $data->map(function($value) use($filter_tanggal){

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

                $value->detail_harga = format_rupiah($value->detail_harga);
                $value->detail_total = format_rupiah($value->detail_total);

                return $value;

            });
                    

        } catch (\Exception $e) {
            $result['message'] = $e->getMessage();  
            return response()->json($result);
        }

        $result['success']       = true;
        $result['data']          = $data;
        $result['total_anak']    = CateringOrder::where('order_close','Y')->where('is_aktif','Y')->where('order_tgl',$filter_tanggal)->count();
        $result['total_order']   = CateringOrderDetail::where('detail_aktif','Y')->where('detail_status','C')->where('detail_tgl',$filter_tanggal)->sum('detail_qty');
        $result['total_tagihan'] = format_rupiah(CateringOrderDetail::where('detail_aktif','Y')->where('detail_status','C')->where('detail_tgl',$filter_tanggal)->sum('detail_total') );


        return response()->json($result);

    }

  

    public function edit(Request $r)
    {
        $id = $r->get('id');

        $data = CateringOrderDetail::where('order_kode',$id)->first();

        $result = array();
        $result['data']             = $data;
        $result['menu_kode']        = $data->menu_kode;
        $result['menu_nama']        = CateringMenu::where('menu_kode',$data->menu_kode)->first()->menu_nama;
        $result['menu_harga']       = format_rupiah($data->detail_harga_jual);


        return response()->json($data);
    }

    public function terima(Request $r){

        $transaction = DB::connection('daycare')->transaction(function() use($r){
  
              $app = SistemApp::sistem();

                $id = $r->get('semua');

                $order_kode   = CateringOrderDetail::whereIn('detail_id',$id)->pluck('order_kode');
                $order_total = CateringOrder::where('order_kode',$order_kode)->sum('order_total');
                $detail_total = CateringOrderDetail::whereIn('detail_id',$id)->pluck('detail_total')->sum();

                $min = $order_total - $detail_total;
                $tmp = CateringOrder::where('order_kode',$order_kode)->first();

                // if ($min == 0) {
                    
                //     $tmp->order_close       = 'Y';

                // }

                $tmp->order_close       = 'Y';

                $tmp->order_total       = $min;
                $tmp->created_nip       = $app['kar_nip'];
                $tmp->created_nama      = $app['kar_nama_awal'];
                $tmp->created_ip        = $r->ip();
                $tmp->updated_ip = $r->ip();

                $tmp->save();
               
                foreach ($id as $key => $value) {
    
                /*-- DETAIL UPDATE --*/

                $sql = DB::connection('daycare')
                            ->table('ctrg_tc_order_detail')
                            ->where('detail_aktif','Y')
                            ->whereIn('detail_id',$id)
                            ->where('detail_status','O')
                            ->update([
                                'detail_status' => 'C'
                            ]);
                }

             
                return true;
                     
          });
  
          return response()->json($transaction);   
    }
    public function update(Request $r){

        $transaction = DB::connection('daycare')->transaction(function() use($r){
  
              $app = SistemApp::sistem();
  
              $id = $r->get('kode');
 
              $tmp = CateringOrderDetail::where('detail_id',$id)->first();

              $tmp->menu_kode = $r->kode;
              $tmp->menu_nama = $r->nama;
              $tmp->menu_harga = $r->harga;
            
              $tmp->save();
  
              return true;
          });
  
          return response()->json($transaction);   
    }
  
    public function void(Request $r){

        $id =$r->get('id');
        $data = CateringOrderDetail::where('detail_id',$id)->delete();
        return response()->json($data);

    }





}
