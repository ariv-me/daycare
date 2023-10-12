<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SistemApp;
use App\Helpers;
use Carbon\Carbon;

use DB;

use App\Models\Pendaftaran;
use App\Models\PendaftaranDetail;
use App\Models\Grup;
use App\Models\Tarif;
use App\Models\HCISKaryawan;


class PendaftaranDetailController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        
        $app = SistemApp::sistem();
        $menu = SistemApp::OtoritasMenu($app['idu']);
        return view('pendaftaran.data_pokok.index',compact('app','menu'));
    }

    public function view(Request $r)
    {
       
        $result = array('success'=>false);

        try{

            $app = SistemApp::sistem();
            $kode = $r->get('kode');


            $data = DB::connection('daycare')
                        ->table('daftar_tc_transaksi_detail AS aa')
                        ->leftjoin('tarif_tc_tarif AS bb','bb.tarif_kode','aa.tarif_kode')
                        ->where('aa.detail_aktif','Y')
                        ->where('aa.trs_kode',null)
                        ->orderby('aa.detail_id','desc')
                        ->get();

            $data = $data->map(function($value) {

                $value->detail           = format_rupiah($value->detail_total);
                return $value;

            });
      
        } catch(\Exeption $e) {

            $result['message'] = $e->getMessage();
            return response()->json($result);

        }

            $result['success'] = true;
            $result['data'] = $data;
            $result['total'] = format_rupiah($data->sum('detail_total'));

        return response()->json($result);

    }


    public function save(Request $r){

        $result = array('success'=>false);

        try {

            $app         = SistemApp::sistem();
            $tmp         = new PendaftaranDetail();  
            $detail_kode = PendaftaranDetail::autokode();  
            $tarif       = Tarif::where('tarif_kode',$r->paket)->first();
            $total_tarif = str_replace(".", "", $r->total_tarif);
            $qty         = $r->qty;

            if ($r->trs_kode != null) {

                $tmp->detail_kode    = $detail_kode;
                $tmp->periode_id     = $r->periode;
                $tmp->grup_kode      = $r->grup;
                $tmp->kat_kode       = $r->kategori;
                $tmp->tarif_kode     = $tarif->tarif_kode;  
                $tmp->detail_qty      = $qty;  
                $tmp->detail_total   = $qty * $total_tarif;
                $tmp->trs_kode       = $r->trs_kode;
                $tmp->anak_kode      = $r->anak_kode;

            } else {
                
                $tmp->detail_kode    = $detail_kode;
                $tmp->periode_id     = $r->periode;
                $tmp->grup_kode      = $r->grup;
                $tmp->kat_kode       = $r->kategori;
                $tmp->tarif_kode     = $tarif->tarif_kode;  
                $tmp->detail_qty      = $qty;  
                $tmp->detail_total   =  $qty * $total_tarif;

            }
       
            $tmp->created_nip    = $app['kar_nip'];
            $tmp->created_nama   = $app['kar_nama_awal'];
            $tmp->created_ip     = $r->ip();
                     
            $tmp->save();

        } catch (\Exception $e) {
            $result['message'] = $e->getMessage();  
            return response()->json($result);
        }

        $result['success'] = true;

        return response()->json($result);
           
    }

    public function edit_detail(Request $r)
    {

        $result = array('success'=>false);

        try{
            $id = $r->get('id');
            $data = DB::connection('daycare')
                            ->table('daftar_tc_transaksi_detail AS aa')
                            ->leftjoin('dapok_tb_anak AS bb','bb.anak_kode','=','aa.anak_kode')
                            ->leftjoin('daftar_tb_ortu AS cc','cc.ortu_id','=','bb.ortu_id')
                            ->where('aa.detail_id',$id)
                            ->first();


        } catch (\Exception $e) {
            $result['message'] = $e->getMessage();  
            return response()->json($result);
        }

        $result['success'] = true;
        $result['data'] = $data;
        $result['total_biaya'] = $data;

        return response()->json($result);

    }

    public function delete(Request $r){


        $kode =$r->get('id');
        $data = PendaftaranDetail::where('detail_kode',$kode)->delete();
        
        return response()->json($data);

    }

    public function anak(Request $r){

        //dd($r);

        $transaction = DB::connection('daycare')->transaction(function() use($r){

            $app = SistemApp::sistem();
            $tmp = new Anak();

            $nis = Anak::autonumber();

            $tmp->anak_nama             = $r->anak_nama;
            $tmp->anak_kode              = $nis;
            $tmp->anak_tmp_lahir        = $r->anak_tmp_lahir;
            $tmp->anak_tgl_lahir        = date('Y-m-d', strtotime($r->anak_tgl_lahir));
            $tmp->anak_jekel            = $r->anak_jekel;
            $tmp->anak_ke               = $r->anak_ke;
            $tmp->anak_jml_saudara      = $r->jml_saudara;
            $tmp->ortu_ayah            = $r->ortu_ayah;
            $tmp->ortu_pekerjaan       = $r->ortu_pekerjaan;
            $tmp->ortu_hp              = $r->ortu_hp;
            $tmp->ortu_alamat          = $r->ortu_alamat;

            //dd($tmp);

            $tmp->save();


        });

        return response()->json($transaction);

    }

}
