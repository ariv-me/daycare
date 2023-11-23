<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SistemApp;
use App\Helpers;
use Carbon\Carbon;

use DB;


use App\Models\PendaftaranDetail;
use App\Models\Grup;
use App\Models\Anak;
use App\Models\Perusahaan;
use App\Models\Tarif;
use App\Models\Agama;
use App\Models\Ortu;
use App\Models\JenisPekerjaan;
use App\Models\HCISKaryawan;

use App\Models\Pendaftaran;
use App\Models\PendaftaranTagihan;
use App\Models\Member;

use App\Models\DapokAnak;
use App\Models\DapokOrtu;
use App\Models\DapokPenjemput;



class PendaftaranController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        
        $app = SistemApp::sistem();
        $menu = SistemApp::OtoritasMenu($app['idu']);
        return view('pendaftaran.transaksi.index',compact('app','menu'));
    }

    public function edit_view($id)
    {   
        $app    = SistemApp::sistem();
        $menu = SistemApp::OtoritasMenu($app['idu']);
        return view('pendaftaran.transaksi.edit',compact('app','menu','id'));
    }


    //------------------------------- ORDER SAVE --------------------------------


    public function save(Request $r){


        $result = array('success'=>false);

        try {

          
            $transaction = DB::connection('daycare')->transaction(function() use($r){
    
                $app        = SistemApp::sistem();

                /*-- TRANSAKSI --*/
    
                $daftar = new Pendaftaran();  

                $daftar_kode = Pendaftaran::autonumber();
                $anak_kode   = DapokAnak::autonumber();
                $ortu_kode   = DapokOrtu::autonumber();
                $pnj_kode    = DapokPenjemput::autonumber();
      
                $tarif       = DB::connection('daycare')
                                ->table('daftar_tc_transaksi_detail AS aa')
                                ->leftjoin('tarif_tc_tarif AS bb','bb.tarif_kode','aa.tarif_kode')
                                ->leftjoin('tarif_ta_jenis AS cc','cc.jenis_kode','bb.jenis_kode')
                                ->where('aa.detail_aktif','Y')
                                ->where('aa.trs_kode',null)
                                ->where('aa.anak_kode',null)
                                ->where('bb.jenis_kode','JN0001')
                                ->first();

                $daftar->trs_tgl        = Carbon::now()->toDateString();
                $daftar->trs_kode       = $daftar_kode;
                $daftar->anak_kode      = $anak_kode;
                $daftar->periode_id     = $r->periode;
                $daftar->tarif_kode     = $tarif->tarif_kode;
                $daftar->grup_kode      = $tarif->grup_kode;
                $daftar->kat_kode       = $tarif->kat_kode;
                $daftar->trs_total      = str_replace(".", "", $r->total_biaya);

                $daftar->created_nip    = $app['kar_nip'];
                $daftar->created_nama   = $app['kar_nama_awal'];
                $daftar->created_ip     = $r->ip();

                
                $detail = PendaftaranDetail::where('trs_kode',null)->where('anak_kode',null)->where('detail_aktif','Y')->get();

                foreach ($detail as $key => $value) {

                    $sql = DB::connection('daycare')
                                ->table('daftar_tc_transaksi_detail')
                                ->where('detail_aktif','Y')
                                ->where('trs_kode',null)
                                ->where('anak_kode',null)
                                ->update([
                                    'trs_kode' => $daftar_kode,
                                    'anak_kode' => $anak_kode,
                                ]);

                }

                /*-- MEMBER --*/
                $member_kode    = Member::autonumber();
                $member = new Member(); 

                $member->member_kode    = $member_kode;
                $member->anak_kode      = $anak_kode;
                $member->periode_id     = $r->periode;
                $member->tarif_kode     = $tarif->tarif_kode;
                $member->grup_kode      = $tarif->grup_kode;
                $member->kat_kode       = $tarif->kat_kode;

                $member->created_nip    = $app['kar_nip'];
                $member->created_nama   = $app['kar_nama_awal'];
                $member->created_ip     = $r->ip();

                /*-- ANAK --*/

                $anak = new DapokAnak();

                $anak->anak_kode          = $anak_kode;
                $anak->ortu_kode          = $ortu_kode;
                $anak->pnj_kode           = $pnj_kode;
                $anak->anak_nama          = $r->anak_nama;
                $anak->anak_tmp_lahir     = $r->anak_tmp_lahir;
                $anak->anak_tgl_lahir     = date('Y-m-d', strtotime($r->anak_tgl_lahir));
                $anak->anak_jekel         = $r->anak_jekel;
                $anak->anak_ke            = $r->anak_ke;
                $anak->anak_jml_saudara   = $r->anak_saudara;
                $anak->agama_id           = $r->anak_agama;
                $anak->anak_berat         = $r->anak_berat;
                $anak->anak_tinggi        = $r->anak_tinggi;                
                $anak->created_nip        = $app['kar_nip'];
                $anak->created_nama       = $app['kar_nama_awal'];
                $anak->created_ip         = $r->ip();


                /*-- ORTU --*/

                $ortu = new DapokOrtu();

                $ortu->ortu_kode               = $ortu_kode;
                $ortu->ortu_ayah               = $r->ayah_nama;
                $ortu->ortu_ayah_nik           = $r->ayah_nik;
                $ortu->ortu_ayah_tgl_lahir     = date('Y-m-d', strtotime($r->ayah_lahir));
                $ortu->ortu_ayah_tmp_lahir     = $r->ayah_tmp_lahir;
                $ortu->ortu_ayah_kerja         = $r->ayah_kerja;
                $ortu->ortu_ayah_pdk_id        = $r->ayah_pdk;
                $ortu->ortu_ayah_hp            = $r->ayah_hp;
                $ortu->ortu_ayah_wa            = $r->ayah_wa;
                $ortu->ortu_ayah_agama_id      = $r->ayah_agama;

                $ortu->ortu_ibu               = $r->ibu_nama;
                $ortu->ortu_ibu_nik           = $r->ibu_nik;
                $ortu->ortu_ibu_tmp_lahir     = $r->ibu_tmp_lahir;
                $ortu->ortu_ibu_tgl_lahir     = date('Y-m-d', strtotime($r->ibu_lahir));
                $ortu->ortu_ibu_kerja         = $r->ibu_kerja;
                $ortu->ortu_ibu_pdk_id        = $r->ibu_pdk;
                $ortu->ortu_ibu_hp            = $r->ibu_hp;
                $ortu->ortu_ibu_wa            = $r->ibu_wa;
                $ortu->ortu_ibu_agama_id      = $r->ibu_agama;

                $ortu->ortu_provinsi_id            = $r->provinsi;
                $ortu->ortu_kota_kode                = $r->kota;
                $ortu->ortu_kecamatan_id           = $r->kecamatan;
                $ortu->ortu_alamat            = $r->alamat;

                $ortu->created_nip           = $app['kar_nip'];
                $ortu->created_nama          = $app['kar_nama_awal'];
                $ortu->created_ip            = $r->ip();           

                /*-- PENJEMPUT --*/

                $pnj = new DapokPenjemput();

                $pnj->pnj_kode              = $pnj_kode;
                $pnj->pnj_nama              = $r->penjemput_nama;
                $pnj->pnj_nik               = $r->penjemput_nik;
                $pnj->pnj_tgl_lahir         = date('Y-m-d', strtotime($r->penjemput_lahir));
                $pnj->pnj_tmp_lahir         = $r->penjemput_tmp_lahir;
                $pnj->pnj_kerja          = $r->penjemput_kerja;
                $pnj->pnj_hp                = $r->penjemput_hp;
                $pnj->pnj_wa                = $r->penjemput_wa;
                $pnj->pnj_agama_id          = $r->penjemput_agama;
                $pnj->pnj_pdk_id            = $r->penjemput_pdk;
                $pnj->pnj_hub_id            = $r->penjemput_hubungan;
                $pnj->pnj_provinsi_id           = $r->penjemput_provinsi;
                $pnj->pnj_kecamatan_id          = $r->penjemput_kecamatan;
                $pnj->pnj_kota_kode               = $r->penjemput_kota;
                $pnj->pnj_alamat            = $r->penjemput_alamat;

                $pnj->created_nip           = $app['kar_nip'];
                $pnj->created_nama          = $app['kar_nama_awal'];
                $pnj->created_ip            = $r->ip();

                $daftar->save();
                $member->save();
                $anak->save();
                $ortu->save();
                $pnj->save();

                return true;
    
            });


        } catch (\Exception $e) {
            $result['message'] = $e->getMessage();  
            return response()->json($result);
        }
        
        $result['success'] = true;

        return response()->json($result);   

    }

    public function update(Request $r){


        $result = array('success'=>false);

        try {

          
            $transaction = DB::connection('daycare')->transaction(function() use($r){
    
                $app        = SistemApp::sistem();
                $tarif      = DB::connection('daycare')
                                ->table('daftar_tc_transaksi_detail AS aa')
                                ->leftjoin('tarif_tc_tarif AS bb','bb.tarif_kode','aa.tarif_kode')
                                ->leftjoin('tarif_ta_jenis AS cc','cc.jenis_kode','bb.jenis_kode')
                                ->where('aa.detail_aktif','Y')
                                ->where('aa.trs_kode',$r->trs_kode)
                                ->where('aa.anak_kode',$r->anak_kode)
                                ->where('bb.jenis_kode','JN0001')
                                ->first();

                               
                
                /*-- DAFTAR --*/
    
                $daftar  = Pendaftaran::where('trs_kode',$r->trs_kode)->first();  

                // $daftar->trs_tgl        = Carbon::now()->toDateString();
                $daftar->periode_id     = $r->periode;
                $daftar->tarif_kode     = $tarif->tarif_kode;
                $daftar->grup_kode      = $tarif->grup_kode;
                $daftar->kat_kode       = $tarif->kat_kode;
                $daftar->trs_total      = str_replace(".", "", $r->total_biaya);
                 
                $daftar->updated_nip    = $app['kar_nip'];
                $daftar->updated_nama   = $app['kar_nama_awal'];
                $daftar->updated_ip     = $r->ip();

                /*-- MEMBER --*/

                $member = Member::where('anak_kode',$r->anak_kode)->first();

                $member->anak_kode      = $r->anak_kode;
                $member->periode_id     = $r->periode;
                $member->tarif_kode     = $tarif->tarif_kode;
                $member->grup_kode      = $tarif->grup_kode;
                $member->kat_kode       = $tarif->kat_kode;

                $member->updated_nip    = $app['kar_nip'];
                $member->updated_nama   = $app['kar_nama_awal'];
                $member->updated_ip     = $r->ip();
                
                /*-- ANAK --*/

                $anak = DapokAnak::where('anak_kode',$r->anak_kode)->first();
                $anak->anak_nama          = $r->anak_nama;
                $anak->anak_tmp_lahir     = $r->anak_tmp_lahir;
                $anak->anak_tgl_lahir     = date('Y-m-d', strtotime($r->anak_tgl_lahir));
                $anak->anak_jekel         = $r->anak_jekel;
                $anak->anak_ke            = $r->anak_ke;
                $anak->anak_jml_saudara   = $r->anak_saudara;
                $anak->agama_id           = $r->anak_agama;
                $anak->anak_berat         = $r->anak_berat;
                $anak->anak_tinggi        = $r->anak_tinggi;     

                $anak->updated_nip        = $app['kar_nip'];
                $anak->updated_nama       = $app['kar_nama_awal'];
                $anak->updated_ip         = $r->ip();

                /*-- ORTU --*/

                $ortu = DapokOrtu::where('ortu_kode',$r->ortu_kode)->first();

                $ortu->ortu_ayah               = $r->ayah_nama;
                $ortu->ortu_ayah_nik           = $r->ayah_nik;
                $ortu->ortu_ayah_tgl_lahir     = date('Y-m-d', strtotime($r->ayah_lahir));
                $ortu->ortu_ayah_tmp_lahir     = $r->ayah_tmp_lahir;
                $ortu->ortu_ayah_kerja         = $r->ayah_kerja;
                $ortu->ortu_ayah_pdk_id        = $r->ayah_pdk;
                $ortu->ortu_ayah_hp            = $r->ayah_hp;
                $ortu->ortu_ayah_wa            = $r->ayah_wa;
                $ortu->ortu_ayah_agama_id      = $r->ayah_agama;

                $ortu->ortu_ibu               = $r->ibu_nama;
                $ortu->ortu_ibu_nik           = $r->ibu_nik;
                $ortu->ortu_ibu_tmp_lahir     = $r->ibu_tmp_lahir;
                $ortu->ortu_ibu_tgl_lahir     = date('Y-m-d', strtotime($r->ibu_lahir));
                $ortu->ortu_ibu_kerja         = $r->ibu_kerja;
                $ortu->ortu_ibu_pdk_id        = $r->ibu_pdk;
                $ortu->ortu_ibu_hp            = $r->ibu_hp;
                $ortu->ortu_ibu_wa            = $r->ibu_wa;
                $ortu->ortu_ibu_agama_id      = $r->ibu_agama;

                $ortu->ortu_provinsi_id            = $r->provinsi;
                $ortu->ortu_kota_kode                = $r->kota;
                $ortu->ortu_kecamatan_id           = $r->kecamatan;
                $ortu->ortu_alamat                 = $r->alamat;

                $ortu->updated_nip           = $app['kar_nip'];
                $ortu->updated_nama          = $app['kar_nama_awal'];
                $ortu->updated_ip            = $r->ip();  

                /*-- PENJEMPUT --*/

                $pnj = DapokPenjemput::where('pnj_kode',$r->pnj_kode)->first();
                $pnj->pnj_nama              = $r->penjemput_nama;
                $pnj->pnj_nik               = $r->penjemput_nik;
                $pnj->pnj_tgl_lahir         = date('Y-m-d', strtotime($r->penjemput_lahir));
                $pnj->pnj_tmp_lahir         = $r->penjemput_tmp_lahir;
                $pnj->pnj_kerja          = $r->penjemput_kerja;
                $pnj->pnj_hp                = $r->penjemput_hp;
                $pnj->pnj_wa                = $r->penjemput_wa;
                $pnj->pnj_agama_id          = $r->penjemput_agama;
                $pnj->pnj_pdk_id            = $r->penjemput_pdk;
                $pnj->pnj_hub_id            = $r->penjemput_hubungan;
                $pnj->pnj_provinsi_id           = $r->penjemput_provinsi;
                $pnj->pnj_kecamatan_id          = $r->penjemput_kecamatan;
                $pnj->pnj_kota_kode               = $r->penjemput_kota;
                $pnj->pnj_alamat            = $r->penjemput_alamat;

                $pnj->updated_nip           = $app['kar_nip'];
                $pnj->updated_nama          = $app['kar_nama_awal'];
                $pnj->updated_ip            = $r->ip();

                $daftar->save();
                $member->save();
                $anak->save();
                $ortu->save();
                $pnj->save();

                return true;
    
            });


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
            
            $data = Anak::get();

        } catch (\Exception $e) {
            $result['message'] = $e->getMessage();  
            return response()->json($result);
        }

        $result['success'] = true;
        $result['data'] = $data;

        return response()->json($result);

    }

    public function edit_get(Request $r){

        $id  = $r->id;

        $data = DB::connection('daycare')
                    ->table('dapok_tb_anak AS aa')          
                    ->leftjoin('dapok_tb_ortu AS bb','bb.ortu_kode','aa.ortu_kode')              
                    ->leftjoin('dapok_tb_penjemput AS cc','cc.pnj_kode','aa.pnj_kode')              
                    ->leftjoin('daftar_tc_transaksi AS dd','dd.anak_kode','aa.anak_kode')              
                    ->leftjoin('tarif_ta_kategori AS ee','ee.kat_kode','dd.kat_kode')              
                    ->orderby('aa.anak_id','desc')
                    ->where('aa.anak_kode',$id)
                    ->first();

        return response()->json($data);

    }

    public function detail_get(Request $r){

        $result = array('success'=>false);

        try{

            $app = SistemApp::sistem();
            $id  = $r->id;
            
            $data = DB::connection('daycare')
                        ->table('daftar_tc_transaksi_detail AS aa')
                        ->leftjoin('tarif_tc_tarif AS bb','bb.tarif_kode','aa.tarif_kode')
                        ->where('aa.detail_aktif','Y')
                        ->where('aa.anak_kode',$id)
                        ->orderby('aa.detail_id','desc')
                        ->get();

            $data = $data->map(function($value) {

                $value->detail  = format_rupiah($value->detail_total); 
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

    public function get(Request $r){

        $result = array('success'=>false);

        try{

           
            $id  = $r->id;

            $data = DB::connection('daycare')
                    ->table('dapok_tb_anak AS aa')          
                    ->leftjoin('dapok_tb_ortu AS bb','bb.ortu_kode','aa.ortu_kode')              
                    ->leftjoin('dapok_tb_penjemput AS cc','cc.pnj_kode','aa.pnj_kode')              
                    ->leftjoin('daftar_tc_transaksi AS dd','dd.anak_kode','aa.anak_kode')              
                    ->leftjoin('tarif_ta_kategori AS ee','ee.kat_id','dd.kat_id')              
                    ->orderby('aa.anak_id','desc')
                    ->where('aa.anak_kode',$id)
                    ->first();


        } catch(\Exeption $e) {
            $result['message'] = $e->getMessage();
            return response()->json($result);
        }

        $result['success'] = true;
        $result['data'] = $data;

        return response()->json($result);

    }


}
