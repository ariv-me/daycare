<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SistemApp;
use App\Helpers;
use Carbon\Carbon;

use DB;
use PDF;


use App\Models\Pembayaran;
use App\Models\Pendaftaran;
use App\Models\PendaftaranDetail;


class PembayaranController extends Controller
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
            
            $tmp = new Pembayaran();  
            $bayar_kode = Pembayaran::autonumber();  
            
            $tmp->bayar_kode        = $bayar_kode;
            $tmp->trs_kode          = $r->kode;
            $tmp->bayar_ket         = $r->keterangan;
            $tmp->bayar_tgl         = date('Y-m-d', strtotime($r->tgl_bayar));
            $tmp->bayar_diskon      = str_replace(".", "", $r->diskon);
            $tmp->bayar_sub_total   = str_replace(".", "", $r->sub_total);
            $tmp->bayar_total       = str_replace(".", "", $r->bayar);


            $daftar = Pendaftaran::where('trs_kode',$r->kode)->first();

            if($r->grand_total <= 0){

                $daftar->trs_status = 'L';
                $daftar->trs_sisa = str_replace(".", "", $r->grand_total);

                $detail = PendaftaranDetail::where('trs_kode',$r->kode)->where('detail_aktif','Y')->get();

                foreach ($detail as $key => $value) {

                    $sql = DB::connection('daycare')
                                ->table('daftar_tc_transaksi_detail')
                                ->where('detail_aktif','Y')
                                ->where('trs_kode',$r->kode)
                                ->update([
                                    'detail_aktif' => 'T',
                                ]);

                }

            } else {

                $daftar->trs_sisa = str_replace(".", "", $r->grand_total);

            }

            $tmp->anak_kode          = $daftar->anak_kode;
            $tmp->created_nip       = $app['kar_nip'];
            $tmp->created_nama      = $app['kar_nama_awal'];
            $tmp->created_ip        = $r->ip();

            $daftar->save();
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

            $anak = $r->get('anak');
            $bulan = $r->get('bulan');
          
            if ($anak === 'Semua') {

                if ($bulan === 'Semua') {

                    $data = DB::connection('daycare')
                                ->table('bayar_tc AS aa')          
                                ->leftjoin('daftar_tc_transaksi AS bb','bb.trs_kode','aa.trs_kode')              
                                ->leftjoin('dapok_tb_anak AS cc','cc.anak_kode','aa.anak_kode')   
                                ->orderby('aa.bayar_id','desc')
                                ->get();
                } else {
                    $data = DB::connection('daycare')
                                ->table('bayar_tc AS aa')          
                                ->leftjoin('daftar_tc_transaksi AS bb','bb.trs_kode','aa.trs_kode')              
                                ->leftjoin('dapok_tb_anak AS cc','cc.anak_kode','aa.anak_kode')   
                                ->whereRaw('MONTH(bayar_tgl) = '.$bulan)  
                                ->orderby('aa.bayar_id','desc')
                                ->get();
                }

               

            } else {

                if ($bulan === 'Semua') {
                    $data = DB::connection('daycare')
                            ->table('bayar_tc AS aa')          
                            ->leftjoin('daftar_tc_transaksi AS bb','bb.trs_kode','aa.trs_kode')              
                            ->leftjoin('dapok_tb_anak AS cc','cc.anak_kode','aa.anak_kode')   
                            ->where('aa.anak_kode',$anak)        
                            ->orderby('aa.bayar_id','desc')
                            ->get();
                } else {
                    $data = DB::connection('daycare')
                            ->table('bayar_tc AS aa')          
                            ->leftjoin('daftar_tc_transaksi AS bb','bb.trs_kode','aa.trs_kode')              
                            ->leftjoin('dapok_tb_anak AS cc','cc.anak_kode','aa.anak_kode')   
                            ->where('aa.anak_kode',$anak)      
                            ->whereRaw('MONTH(bayar_tgl) = '.$bulan)
                            ->orderby('aa.bayar_id','desc')
                            ->get();
            
                }
              

            }

            
            $data = $data->map(function($value) {

                   $value->cetak         = route('pembayaran.cetak',$value->bayar_kode);
                   $value->bayar_tgl     = format_indo($value->bayar_tgl);
                   $value->diskon        = format_rupiah($value->bayar_diskon);
                   $value->total         = format_rupiah($value->bayar_total);
                   $value->sub_total     = format_rupiah($value->bayar_sub_total);
          
                return $value;

            });

        } catch (\Exception $e) {
            $result['message'] = $e->getMessage();  
            return response()->json($result);
        }

        $result['success'] = true;
        $result['data'] = $data;
        $result['total'] = format_rupiah($data->sum('bayar_total'));

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

    public function cetak($id){

        $app  = SistemApp::sistem();
        $data = DB::connection('daycare')
                    ->table('bayar_tc AS aa')          
                    ->leftjoin('daftar_tc_transaksi AS bb','bb.trs_kode','aa.trs_kode')              
                    ->leftjoin('dapok_tb_anak AS cc','cc.anak_kode','aa.anak_kode')   
                    ->leftjoin('dapok_tb_ortu AS dd','dd.ortu_kode','cc.ortu_kode')              
                    ->where('aa.bayar_kode',$id)
                    ->first();

        
        if ($data->anak_jekel == 'L'){
            $jekel = 'Laki-Laki';
        } else {
            $jekel = 'Perempuan';
        }
        
        $kode = $data->trs_kode;

        $tagihan = DB::connection('daycare')
                    ->table('daftar_tc_transaksi AS aa')          
                    ->leftjoin('dapok_tb_anak AS bb','bb.anak_kode','aa.anak_kode')           
                    ->leftjoin('dapok_tb_ortu AS cc','cc.ortu_kode','bb.ortu_kode')              
                    ->leftjoin('dapok_tb_penjemput AS dd','dd.pnj_kode','bb.pnj_kode')              
                    ->leftjoin('tarif_tc_tarif AS ee','ee.tarif_kode','aa.tarif_kode')         
                    ->leftjoin('tarif_ta_jenis AS ff','ff.jenis_kode','ee.jenis_kode')         
                    ->leftjoin('tarif_ta_kategori AS gg','gg.kat_kode','aa.kat_kode')         
                    ->where('aa.trs_kode',$kode)
                    ->first();

        $tagihan_detail = DB::connection('daycare')
                    ->table('daftar_tc_transaksi_detail AS aa')
                    ->leftjoin('tarif_tc_tarif AS bb','bb.tarif_kode','aa.tarif_kode')
                    ->leftjoin('tarif_ta_jenis AS cc','cc.jenis_kode','bb.jenis_kode')
                    ->where('aa.trs_kode',$kode)
                    ->orderby('aa.detail_id','desc')
                    ->get();
        
        $tagihan_detail = $tagihan_detail->map(function($value) {

            $value->detail      = format_rupiah($value->detail_total);
            return $value;

        });

        if ($tagihan->trs_sisa == '0') {
            $status = 'Lunas';
        } else {
            $status = 'Belum Lunas';
        }

        $tgl_lahir   = format_indo($data->anak_tgl_lahir);
        $tgl_bayar   = format_indo($data->bayar_tgl);
        $jatuh_tempo = format_indo($data->trs_jatuh_tempo);    
        $sisa        = format_rupiah($tagihan->trs_sisa); 
        $sub_total   = format_rupiah($tagihan->trs_total);            
        $bayar       = format_rupiah($data->bayar_total);            

        $pdf = PDF::loadview('pembayaran.cetak',compact('status','sub_total','sisa','bayar','data','app','tagihan','tgl_lahir','tgl_bayar','jatuh_tempo','jekel','tagihan_detail'));
        return $pdf->stream('Invoice Pembayaran.pdf');

    }

    public function cetak_all($id){

        $app  = SistemApp::sistem();
        $data = DB::connection('daycare')
                    ->table('daftar_tc_transaksi AS aa')          
                    ->leftjoin('dapok_tb_anak AS bb','bb.anak_kode','aa.anak_kode')           
                    ->leftjoin('dapok_tb_ortu AS cc','cc.ortu_kode','bb.ortu_kode')              
                    ->leftjoin('dapok_tb_penjemput AS dd','dd.pnj_kode','bb.pnj_kode')              
                    ->leftjoin('tarif_tc_tarif AS ee','ee.tarif_kode','aa.tarif_kode')         
                    ->leftjoin('tarif_ta_jenis AS ff','ff.jenis_kode','ee.jenis_kode')         
                    ->leftjoin('tarif_ta_kategori AS gg','gg.kat_kode','aa.kat_kode')         
                    ->where('aa.trs_kode',$id)
                    ->first();
        
        $total_tagihan   = format_rupiah($data->trs_total);             
        
        if ($data->anak_jekel == 'L'){
            $jekel = 'Laki-Laki';
        } else {
            $jekel = 'Perempuan';
        }
        
        $kode = $data->trs_kode;

        $tagihan_detail = DB::connection('daycare')
                    ->table('daftar_tc_transaksi_detail AS aa')
                    ->leftjoin('tarif_tc_tarif AS bb','bb.tarif_kode','aa.tarif_kode')
                    ->leftjoin('tarif_ta_jenis AS cc','cc.jenis_kode','bb.jenis_kode')
                    ->where('aa.trs_kode',$kode)
                    ->orderby('aa.detail_id','desc')
                    ->get();
        
        $tagihan_detail = $tagihan_detail->map(function($value) {

            $value->detail      = format_rupiah($value->detail_total);
            return $value;

        });

        if ($data->trs_sisa == '0') {
            $status = 'Lunas';
        } else {
            $status = 'Belum Lunas';
        }

        $tgl_lahir   = format_indo($data->anak_tgl_lahir);
        $jatuh_tempo = format_indo($data->trs_jatuh_tempo);    
        $sisa        = format_rupiah($data->trs_sisa); 
       

        $bayar = DB::connection('daycare')
                    ->table('bayar_tc AS aa')          
                    ->leftjoin('daftar_tc_transaksi AS bb','bb.trs_kode','aa.trs_kode')              
                    ->leftjoin('dapok_tb_anak AS cc','cc.anak_kode','aa.anak_kode')   
                    ->leftjoin('dapok_tb_ortu AS dd','dd.ortu_kode','cc.ortu_kode')              
                    ->where('aa.trs_kode',$id)
                    ->get();

        $bayar = $bayar->map(function($value) {

            $value->total      = format_rupiah($value->bayar_total);
            $value->bayar_tgl      = format_indo($value->bayar_tgl);
            return $value;

        });
        
        $total_bayar = format_rupiah($bayar->where('trs_kode',$id)->sum('bayar_total'));
            

        $pdf = PDF::loadview('pembayaran.cetak_all',compact('total_tagihan','total_bayar','bayar','data','jekel','tgl_lahir','jatuh_tempo','tagihan_detail','status','sisa'));
        return $pdf->stream('Invoice Pembayaran.pdf');

    }

}
