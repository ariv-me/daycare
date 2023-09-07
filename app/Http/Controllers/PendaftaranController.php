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
use App\Models\Tagihan;

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

                /*-- DAFTAR --*/
    
                $daftar = new Pendaftaran();  

                $daftar_kode = Pendaftaran::autonumber();
                $anak_kode   = DapokAnak::autonumber();
                $ortu_kode   = DapokOrtu::autonumber();
                $pnj_kode    = DapokPenjemput::autonumber();
                $tag_kode    = Tagihan::autonumber();
                $tarif       = Tarif::where('tarif_kode',$r->paket)->first();

                

                $daftar->daftar_tgl     = date('Y-m-d', strtotime($r->tgl_daftar));
                $daftar->periode_id     = $r->periode;
                $daftar->daftar_kode    = $daftar_kode;
                $daftar->anak_kode      = $anak_kode;
                $daftar->grup_id        = $r->grup;
                $daftar->kat_id         = $r->kategori;
                $daftar->tarif_kode     = $r->paket;     
                $daftar->tarif_id       = $tarif->tarif_id;  
                $daftar->tarif_total    = $tarif->tarif_reg + $tarif->tarif_gizi + $tarif->tarif_spp + $tarif->tarif_pembg;     
                $daftar->kar_id         = $app['kar_id'];
                $daftar->created_nip    = $app['kar_nip'];
                $daftar->created_nama   = $app['kar_nama_awal'];
                $daftar->created_ip     = $r->ip();


                /*-- TAGIHAN --*/

                $tag = new Tagihan();  

                $tag->tag_kode       = $tag_kode;
                $tag->daftar_kode    = $daftar_kode;
                $tag->tag_total      = $tarif->tarif_reg + $tarif->tarif_gizi + $tarif->tarif_spp + $tarif->tarif_pembg;
                $tag->kar_id         = $app['kar_id'];
                $tag->created_nip    = $app['kar_nip'];
                $tag->created_nama   = $app['kar_nama_awal'];
                $tag->created_ip     = $r->ip();


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
                $ortu->ortu_kota_id                = $r->kota;
                $ortu->ortu_kecamatan_id           = $r->kecamatan;
                $ortu->ortu_ortu_alamat            = $r->alamat;

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
                $pnj->pnj_kota_id               = $r->penjemput_kota;
                $pnj->pnj_alamat            = $r->penjemput_alamat;

                $pnj->created_nip           = $app['kar_nip'];
                $pnj->created_nama          = $app['kar_nama_awal'];
                $pnj->created_ip            = $r->ip();

                $tag->save();
                $daftar->save();
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

                /*-- DAFTAR --*/
    
                $daftar  = Pendaftaran::where('daftar_kode',$r->daftar_kode)->first();  

                $tarif   = Tarif::where('tarif_kode',$r->paket)->first();
                $daftar->periode_id     = $r->periode;
                $daftar->grup_id        = $r->grup;
                $daftar->kat_id         = $r->kategori;
                $daftar->tarif_kode     = $r->paket;     
                $daftar->tarif_id       = $tarif->tarif_id;        
                $daftar->tarif_total    = $tarif->total;     
                $daftar->kar_id         = $app['kar_id'];
                $daftar->updated_nip    = $app['kar_nip'];
                $daftar->updated_nama   = $app['kar_nama_awal'];
                $daftar->updated_ip     = $r->ip();
                
                /*-- TAGIHAN --*/
                
                $tag = Tagihan::where('daftar_kode',$r->daftar_kode)->first();  
                $tag_total_sum  = Pendaftaran::where('daftar_kode',$r->daftar_kode)->sum('tarif_total');

                $tag->tag_total      =  $tag_total_sum;
                $tag->kar_id         = $app['kar_id'];
                $tag->updated_nip    = $app['kar_nip'];
                $tag->updated_nama   = $app['kar_nama_awal'];
                $tag->updated_ip     = $r->ip();

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
                $ortu->ortu_kota_id                = $r->kota;
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
                $pnj->pnj_kota_id               = $r->penjemput_kota;
                $pnj->pnj_alamat            = $r->penjemput_alamat;

                $pnj->updated_nip           = $app['kar_nip'];
                $pnj->updated_nama          = $app['kar_nama_awal'];
                $pnj->updated_ip            = $r->ip();

                $daftar->save();
                $tag->save();
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
                    ->leftjoin('tarif_ta_kategori AS ee','ee.kat_id','dd.kat_id')              
                    ->orderby('aa.anak_id','desc')
                    ->where('aa.anak_kode',$id)
                    ->first();


        return response()->json($data);

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
