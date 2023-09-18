<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SistemApp;
use App\Helpers;
use Carbon\Carbon;

use DB;

use App\Models\PendaftaranBayar;
use App\Models\Pendaftaran;


class PendaftaranTagihanController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        
        $app = SistemApp::sistem();
        $menu = SistemApp::OtoritasMenu($app['idu']);
        return view('pendaftaran.tagihan.index',compact('app','menu'));
    }

    public function save(Request $r){

        $result = array('success'=>false);

        try {

            $app        = SistemApp::sistem();
            
            $tmp = new PendaftaranBayar();  
            $bayar_kode = PendaftaranBayar::autonumber();  
            
            $tmp->bayar_kode        = $bayar_kode;
            $tmp->trs_kode          = $r->kode;
            $tmp->bayar_ket         = $r->keterangan;
            $tmp->bayar_tgl         = date('Y-m-d', strtotime($r->tgl_bayar));
            $tmp->bayar_sub_total   = str_replace(".", "", $r->sub_total);
            $tmp->bayar_diskon      = str_replace(".", "", $r->diskon);
            $tmp->bayar_diskon      = str_replace(".", "", $r->diskon);
            $tmp->bayar_grand_total = str_replace(".", "", $r->grand_total);
       
            $tmp->created_nip   = $app['kar_nip'];
            $tmp->created_nama  = $app['kar_nama_awal'];
            $tmp->created_ip    = $r->ip();

            $daftar = Pendaftaran::where('trs_kode',$r->kode)->first();

            $daftar->trs_status = 'L';
            $daftar->trs_untuk_bulan = date('m', strtotime($r->bulan));

            dd($daftar);
  
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

            
            $data = DB::connection('daycare')
                            ->table('dapok_tb_anak AS aa')          
                            ->leftjoin('dapok_tb_ortu AS bb','bb.ortu_kode','aa.ortu_kode')              
                            ->leftjoin('dapok_tb_penjemput AS cc','cc.pnj_kode','aa.pnj_kode')              
                            ->leftjoin('daftar_tc_transaksi AS dd','dd.anak_kode','aa.anak_kode')         
                            ->leftjoin('daftar_tc_transaksi_detail AS ee','ee.trs_kode','dd.trs_kode')         
                            ->leftjoin('tarif_tc_tarif AS ff','ff.tarif_kode','ee.tarif_kode')         
                            ->leftjoin('tarif_ta_jenis AS gg','gg.jenis_kode','ff.jenis_kode')         
                            ->leftjoin('tarif_ta_kategori AS hh','hh.kat_kode','ee.kat_kode')         
                            ->orderby('aa.anak_id','desc')
                            ->get();

                $data = $data->map(function($value) {

                   $value->edit = route('pendaftaran.transaksi.edit_view',$value->anak_kode); 
                   $value->anak_tgl_lahir = format_indo($value->anak_tgl_lahir);
                   $value->tarif_total    = format_rupiah($value->trs_total);

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

            $app = SistemApp::sistem();
            $kode = $r->get('kode');


            $data = DB::connection('daycare')
                        ->table('daftar_tc_transaksi_detail AS aa')
                        ->leftjoin('tarif_tc_tarif AS bb','bb.tarif_kode','aa.tarif_kode')
                        ->where('aa.detail_aktif','Y')
                        ->where('aa.trs_kode',$kode)
                        ->orderby('aa.detail_id','desc')
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
            $result['total'] = format_rupiah($data->sum('tarif_total'));

        return response()->json($result);

    }

}
