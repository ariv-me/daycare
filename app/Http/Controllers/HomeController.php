<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SistemApp;
use DB;

use App\Helpers;
use Carbon\Carbon;
use StdClass;

use App\Models\Pendaftaran;
use App\Models\PendaftaranDetail;
use App\Models\Pembayaran;
use App\Models\Member;


class HomeController extends Controller
{
   
     
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index()
    {
        $app = SistemApp::sistem();
        $unit = $app['unit_nama'];
        $menu = SistemApp::OtoritasMenu($app['idu']);

        return view('home',compact('app','menu','unit'));  
    }

    public function index_blank()
    {
        $app = SistemApp::sistem();
        $unit = $app['unit_nama'];
        $menu = SistemApp::OtoritasMenu($app['idu']);

        return view('blank',compact('app','menu','unit'));        

    }

    public function member(Request $r){

        $result = array('success'=>false);

        try{

            $data = DB::connection('daycare')
                        ->table('daftar_tc_member AS aa')      
                        ->select(

                            'aa.member_id',
                            'aa.anak_kode',
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
                        ->orderby('aa.member_id','asc')
                        ->where('aa.member_aktif','Y')
                        ->get();

          

        } catch (\Exception $e) {
            $result['message'] = $e->getMessage();  
            return response()->json($result);
        }

        $result['success'] = true;
        $result['data'] = $data;
        $result['pria'] = format_rupiah($data->where('anak_jekel','L')->where('anak_aktif','Y')->count('anak_id'));
        $result['perempuan'] = format_rupiah($data->where('anak_jekel','P')->where('anak_aktif','Y')->count('anak_id'));
        $result['total'] = format_rupiah($data->where('anak_aktif','Y')->count('anak_id'));

        return response()->json($result);

    }


    public function tagihan(Request $r){

        $result = array('success'=>false);

        try{

            $anak  = $r->get('anak');
            $bulan = $r->get('bulan');

            if ($anak === 'Semua') {

                if ($bulan === 'Semua') {

                    $data = DB::connection('daycare')
                                ->table('daftar_tc_transaksi AS aa')          
                                ->leftjoin('dapok_tb_anak AS bb','bb.anak_kode','aa.anak_kode')           
                                ->leftjoin('dapok_tb_ortu AS cc','cc.ortu_kode','bb.ortu_kode')              
                                ->leftjoin('dapok_tb_penjemput AS dd','dd.pnj_kode','bb.pnj_kode')              
                                ->leftjoin('tarif_tc_tarif AS ee','ee.tarif_kode','aa.tarif_kode')         
                                ->leftjoin('tarif_ta_jenis AS ff','ff.jenis_kode','ee.jenis_kode')         
                                ->leftjoin('tarif_ta_kategori AS gg','gg.kat_kode','aa.kat_kode')         
                                ->orderby('aa.trs_id','desc')
                                ->where('aa.trs_status','U')
                                ->get();
                } else {

                    $data = DB::connection('daycare')
                                ->table('daftar_tc_transaksi AS aa')          
                                ->leftjoin('dapok_tb_anak AS bb','bb.anak_kode','aa.anak_kode')           
                                ->leftjoin('dapok_tb_ortu AS cc','cc.ortu_kode','bb.ortu_kode')              
                                ->leftjoin('dapok_tb_penjemput AS dd','dd.pnj_kode','bb.pnj_kode')              
                                ->leftjoin('tarif_tc_tarif AS ee','ee.tarif_kode','aa.tarif_kode')         
                                ->leftjoin('tarif_ta_jenis AS ff','ff.jenis_kode','ee.jenis_kode')         
                                ->leftjoin('tarif_ta_kategori AS gg','gg.kat_kode','aa.kat_kode')   
                                ->whereRaw('MONTH(trs_jatuh_tempo) = '.$bulan)  
                                ->orderby('aa.trs_id','desc')
                                ->where('aa.trs_status','U')
                                ->get();

                }

            }
            
            else {

                if ($bulan === 'Semua') {
                    $data = DB::connection('daycare')
                            ->table('daftar_tc_transaksi AS aa')          
                            ->leftjoin('dapok_tb_anak AS bb','bb.anak_kode','aa.anak_kode')           
                            ->leftjoin('dapok_tb_ortu AS cc','cc.ortu_kode','bb.ortu_kode')              
                            ->leftjoin('dapok_tb_penjemput AS dd','dd.pnj_kode','bb.pnj_kode')              
                            ->leftjoin('tarif_tc_tarif AS ee','ee.tarif_kode','aa.tarif_kode')         
                            ->leftjoin('tarif_ta_jenis AS ff','ff.jenis_kode','ee.jenis_kode')         
                            ->leftjoin('tarif_ta_kategori AS gg','gg.kat_kode','aa.kat_kode')     
                            ->where('aa.anak_kode',$anak)    
                            ->orderby('aa.trs_id','desc')
                            ->where('aa.trs_status','U')
                            ->get();
                } else {
                    $data = DB::connection('daycare')
                            ->table('daftar_tc_transaksi AS aa')          
                            ->leftjoin('dapok_tb_anak AS bb','bb.anak_kode','aa.anak_kode')           
                            ->leftjoin('dapok_tb_ortu AS cc','cc.ortu_kode','bb.ortu_kode')              
                            ->leftjoin('dapok_tb_penjemput AS dd','dd.pnj_kode','bb.pnj_kode')              
                            ->leftjoin('tarif_tc_tarif AS ee','ee.tarif_kode','aa.tarif_kode')         
                            ->leftjoin('tarif_ta_jenis AS ff','ff.jenis_kode','ee.jenis_kode')         
                            ->leftjoin('tarif_ta_kategori AS gg','gg.kat_kode','aa.kat_kode')     
                            ->where('aa.anak_kode',$anak)   
                            ->whereRaw('MONTH(trs_jatuh_tempo) = '.$bulan)  
                            ->orderby('aa.trs_id','desc')
                            ->where('aa.trs_status','U')
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


}
