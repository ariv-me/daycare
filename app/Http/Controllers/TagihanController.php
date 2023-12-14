<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SistemApp;
use App\Helpers;
use Carbon\Carbon;

use DB;


use App\Models\Pendaftaran;
use App\Models\PendaftaranDetail;
use App\Models\Pembayaran;


class TagihanController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        
        $app = SistemApp::sistem();
        $menu = SistemApp::OtoritasMenu($app['idu']);
        return view('tagihan.index',compact('app','menu'));
    }

    public function add()
    {
        
        $app = SistemApp::sistem();
        $menu = SistemApp::OtoritasMenu($app['idu']);
        return view('tagihan.add',compact('app','menu'));
    }

    public function data()
    {
        
        $app = SistemApp::sistem();
        $menu = SistemApp::OtoritasMenu($app['idu']);
        return view('pembayaran.index',compact('app','menu'));
    }

    public function save(Request $r){

        $result = array('success'=>false);

        try {

            $app        = SistemApp::sistem();
            
            $tmp = new Pendaftaran();  
            $daftar_kode = Pendaftaran::autonumber();

            $tarif       = DB::connection('daycare')
                                ->table('daftar_tc_transaksi_detail AS aa')
                                ->leftjoin('tarif_tc_tarif AS bb','bb.tarif_kode','aa.tarif_kode')
                                ->leftjoin('tarif_ta_jenis AS cc','cc.jenis_kode','bb.jenis_kode')
                                ->where('aa.detail_aktif','Y')
                                ->where('aa.trs_kode',null)
                                ->where('aa.anak_kode',null)
                                ->where('bb.jenis_kode','JN0001')
                                ->first();

            

            if ($tarif == null) {
                $tarif       = DB::connection('daycare')
                                ->table('daftar_tc_transaksi_detail AS aa')
                                ->leftjoin('tarif_tc_tarif AS bb','bb.tarif_kode','aa.tarif_kode')
                                ->leftjoin('tarif_ta_jenis AS cc','cc.jenis_kode','bb.jenis_kode')
                                ->where('aa.detail_aktif','Y')
                                ->where('aa.trs_kode',null)
                                ->where('aa.anak_kode',null)
                                ->where('bb.jenis_kode','JN0002')
                                ->first();

            }
        

            $tmp->trs_tgl        = date('Y-m-d', strtotime($r->tgl_daftar));
            $tmp->trs_jatuh_tempo = date('Y-m-d', strtotime($r->jatuh_tempo));
            $tmp->trs_kode       = $daftar_kode;
            $tmp->anak_kode      = $r->anak;
            $tmp->periode_id     = $r->periode;
            $tmp->tarif_kode     = $tarif->tarif_kode; 
            $tmp->grup_kode      = $r->grup;
            $tmp->kat_kode       = $r->kategori;
            $tmp->trs_total      = str_replace(".", "", $r->total_biaya);
            $tmp->trs_sub_total  = str_replace(".", "", $r->total_biaya);
            $tmp->trs_sisa       = str_replace(".", "", $r->total_biaya);

            $tmp->created_nip       = $app['kar_nip'];
            $tmp->created_nama      = $app['kar_nama_awal'];
            $tmp->created_ip        = $r->ip();

             
            $detail = PendaftaranDetail::where('trs_kode',null)->where('anak_kode',null)->where('detail_aktif','Y')->get();

            foreach ($detail as $key => $value) {

                $sql = DB::connection('daycare')
                            ->table('daftar_tc_transaksi_detail')
                            ->where('detail_aktif','Y')
                            ->where('trs_kode',null)
                            ->where('anak_kode',null)
                            ->update([
                                'trs_kode' => $daftar_kode,
                                'anak_kode' => $r->anak,
                            ]);

            }

            $tmp->save();

        } catch (\Exception $e) {
            $result['message'] = $e->getMessage();  
            return response()->json($result);
        }

        $result['success'] = true;
        return response()->json($result);
           
    }


    public function view(Request $r){

        $result = array('success'=>false);

        try{

            $anak  = $r->get('anak');
            $bulan = $r->get('bulan');

           

            if ($anak === 'Semua') {

                if ($bulan === 'Semua') {

                    $data = DB::connection('daycare')
                                ->table('daftar_tc_transaksi AS aa')          
                                ->leftjoin('dapok_tb_anak AS bb','bb.anak_kode','aa.anak_kode')                       
                                ->leftjoin('tarif_tc_tarif AS ee','ee.tarif_kode','aa.tarif_kode')         
                                ->leftjoin('tarif_ta_jenis AS ff','ff.jenis_kode','ee.jenis_kode')         
                                ->leftjoin('tarif_ta_kategori AS gg','gg.kat_kode','aa.kat_kode')         
                                ->orderby('aa.trs_id','desc')
                                ->get();
                } else {

                    $data = DB::connection('daycare')
                                ->table('daftar_tc_transaksi AS aa')          
                                ->leftjoin('dapok_tb_anak AS bb','bb.anak_kode','aa.anak_kode')                       
                                ->leftjoin('tarif_tc_tarif AS ee','ee.tarif_kode','aa.tarif_kode')         
                                ->leftjoin('tarif_ta_jenis AS ff','ff.jenis_kode','ee.jenis_kode')         
                                ->leftjoin('tarif_ta_kategori AS gg','gg.kat_kode','aa.kat_kode')         
                                ->whereRaw('MONTH(trs_jatuh_tempo) = '.$bulan)  
                                ->orderby('aa.trs_id','desc')
                                ->get();

                }

            }
            
            else {

                if ($bulan === 'Semua') {
                    $data = DB::connection('daycare')
                            ->table('daftar_tc_transaksi AS aa')          
                            ->leftjoin('dapok_tb_anak AS bb','bb.anak_kode','aa.anak_kode')                       
                            ->leftjoin('tarif_tc_tarif AS ee','ee.tarif_kode','aa.tarif_kode')         
                            ->leftjoin('tarif_ta_jenis AS ff','ff.jenis_kode','ee.jenis_kode')         
                            ->leftjoin('tarif_ta_kategori AS gg','gg.kat_kode','aa.kat_kode')         
                            ->orderby('aa.trs_id','desc')
                            ->where('aa.anak_kode',$anak)    
                            ->orderby('aa.trs_id','desc')
                            ->get();
                } else {
                    $data = DB::connection('daycare')
                            ->table('daftar_tc_transaksi AS aa')          
                            ->leftjoin('dapok_tb_anak AS bb','bb.anak_kode','aa.anak_kode')                       
                            ->leftjoin('tarif_tc_tarif AS ee','ee.tarif_kode','aa.tarif_kode')         
                            ->leftjoin('tarif_ta_jenis AS ff','ff.jenis_kode','ee.jenis_kode')         
                            ->leftjoin('tarif_ta_kategori AS gg','gg.kat_kode','aa.kat_kode')       
                            ->where('aa.anak_kode',$anak)   
                            ->whereRaw('MONTH(trs_jatuh_tempo) = '.$bulan)  
                            ->orderby('aa.trs_id','desc')
                            ->get();
            
                }

            }
            
            
                
            $data = $data->map(function($value) {

                $value->edit   = route('pendaftaran.transaksi.edit_view',$value->trs_kode); 
                $value->cetak  = route('pembayaran.cetak_all',$value->trs_kode);
                $value->total_bayar = format_rupiah(Pembayaran::where('trs_kode',$value->trs_kode)->sum('bayar_total'));

                if($value->trs_status == 'U') {

                    $value->status = 'Belum Lunas';

                } else {

                    $value->status = 'Lunas';

                }

                $value->anak_tgl_lahir  = format_indo($value->anak_tgl_lahir);
                $value->trs_jatuh_tempo = format_indo($value->trs_jatuh_tempo);
                $value->trs_tgl         = format_indo($value->trs_tgl);
                $value->tarif_total     = format_rupiah($value->trs_sisa);

                if($value->anak_jekel == 'L'){
                    $value->anak_jekel = 'Laki - Laki';
                }
                else if($value->anak_jekel == 'P'){
                    $value->anak_jekel = 'Perempuan';
                }
                    
                return $value;

            });

        } catch (\Exception $e) {
            $result['message'] = $e->getMessage();  
            return response()->json($result);
        }

        $result['success'] = true;
        $result['data'] = $data;
        $result['lunas'] = format_rupiah($data->where('trs_status','L')->sum('trs_total'));
        $result['belum_lunas'] = format_rupiah($data->where('trs_status','U')->sum('trs_total'));
        $result['total'] = format_rupiah($data->sum('trs_total'));

        return response()->json($result);

    }


    public function edit(Request $r)
    {
        $id = $r->get('id');
        $data = DB::connection('daycare')
                    ->table('dapok_tb_anak AS aa')                     
                    ->leftjoin('daftar_tc_transaksi AS dd','dd.anak_kode','aa.anak_kode')         
                    ->leftjoin('daftar_tc_transaksi_detail AS ee','ee.trs_kode','dd.trs_kode')         
                    ->leftjoin('tarif_tc_tarif AS ff','ff.tarif_kode','ee.tarif_kode')         
                    ->leftjoin('tarif_ta_jenis AS gg','gg.jenis_kode','ff.jenis_kode')         
                    ->leftjoin('tarif_ta_kategori AS hh','hh.kat_kode','ee.kat_kode')         
                    ->where('dd.trs_kode',$id)
                    ->first();

        return response()->json($data);

    }

    public function detail_view(Request $r)
    {
       
        $result = array('success'=>false);

        try{

            $app  = SistemApp::sistem();
            $kode = $r->get('kode');
            $data = DB::connection('daycare')
                        ->table('daftar_tc_transaksi_detail AS aa')
                        ->leftjoin('tarif_tc_tarif AS bb','bb.tarif_kode','aa.tarif_kode')
                        ->leftjoin('tarif_tb_item AS cc','cc.item_kode','aa.item_kode')
                        ->where('aa.detail_aktif','Y')
                        ->where('aa.trs_kode',$kode)
                        ->orderby('aa.detail_id','desc')
                        ->get();

            $total =  DB::connection('daycare')
                        ->table('daftar_tc_transaksi AS aa')
                        ->where('aa.trs_kode',$kode)
                        ->get();
        
            $data = $data->map(function($value) {

                $value->detail      = format_rupiah($value->detail_total);
                return $value;

            });
      
        } catch(\Exeption $e) {

            $result['message'] = $e->getMessage();
            return response()->json($result);

        }

            $result['success'] = true;
            $result['data'] = $data;
            $result['total'] = format_rupiah($total->sum('trs_total'));

        return response()->json($result);

    }

    

}
