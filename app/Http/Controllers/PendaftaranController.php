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
                $tarif       = Tarif::where('grup_id',$r->grup)->where('jenis_id',$r->paket)->first();

                

                $daftar->daftar_tgl     = date('Y-m-d', strtotime($r->tgl_daftar));
                $daftar->periode_id     = $r->periode;
                $daftar->daftar_kode    = $daftar_kode;
                $daftar->anak_kode      = $anak_kode;
                $daftar->grup_id        = $r->grup;
                $daftar->jenis_id       = $r->paket;
                $daftar->daftar_ket     = $r->keterangan;
                $daftar->tarif_kode     = $tarif->tarif_kode;     
                $daftar->tarif_id       = $tarif->tarif_id;     
                $daftar->tarif_reg      = $tarif->tarif_reg;     
                $daftar->tarif_spp      = $tarif->tarif_spp;     
                $daftar->tarif_pembg    = $tarif->tarif_pembg;     
                $daftar->tarif_total    = $tarif->tarif_reg + $tarif->tarif_spp + $tarif->tarif_pembg;     
                $daftar->kar_id         = $app['kar_id'];

                /*-- TAGIHAN --*/

                $tag = new Tagihan();  

                $tag->tag_kode       = $tag_kode;
                $tag->daftar_kode    = $daftar_kode;
                $tag->tag_total      = $tarif->tarif_reg + $tarif->tarif_spp + $tarif->tarif_pembg;
                $tag->kar_id         = $app['kar_id'];

                /*-- ANAK --*/

                $anak = new DapokAnak();

                $anak->anak_nis           = $anak_kode;
                $anak->ortu_kode            = $ortu_kode;
                $anak->pnj_kode             = $pnj_kode;
                $anak->anak_nama          = $r->anak_nama;
                $anak->anak_tmp_lahir     = $r->anak_tmp_lahir;
                $anak->anak_tgl_lahir     = date('Y-m-d', strtotime($r->anak_tgl_lahir));
                $anak->anak_jekel         = $r->anak_jekel;
                $anak->anak_ke            = $r->anak_ke;
                $anak->anak_jml_saudara   = $r->anak_saudara;
                $anak->agama_id           = $r->anak_agama;
                $anak->anak_berat         = $r->anak_berat;
                $anak->anak_tinggi        = $r->anak_tinggi;                
                $anak->created_nip           = $app['kar_nip'];
                $anak->created_nama          = $app['kar_nama_awal'];
                $anak->created_ip            = $r->ip();

                /*-- ORTU --*/

                $ortu = new DapokOrtu();

                $ortu->ortu_kode               = $ortu_kode;
                $ortu->ortu_ayah               = $r->ayah_nama;
                $ortu->ortu_ayah_nik           = $r->ayah_nik;
                $ortu->ortu_ayah_tgl_lahir     = date('Y-m-d', strtotime($r->ayah_lahir));
                $ortu->ortu_ayah_tmp_lahir     = $r->ayah_tmp_lahir;
                $ortu->ortu_ayah_kerja         = $r->ayah_kerja;
                $ortu->ortu_ayah_pdk_id        = $r->ayah_pdk;
                $ortu->ortu_ayah_peru          = $r->ayah_perusahaan;
                $ortu->ortu_ayah_hp            = $r->ayah_hp;
                $ortu->ortu_ayah_wa            = $r->ayah_wa;
                $ortu->ortu_ayah_agama_id      = $r->ayah_agama;

                $ortu->ortu_ibu               = $r->ibu_nama;
                $ortu->ortu_ibu_nik           = $r->ibu_nik;
                $ortu->ortu_ibu_tmp_lahir     = $r->ibu_tmp_lahir;
                $ortu->ortu_ibu_tgl_lahir     = date('Y-m-d', strtotime($r->ibu_lahir));
                $ortu->ortu_ibu_kerja         = $r->ibu_kerja;
                $ortu->ortu_ibu_pdk_id        = $r->ibu_pdk;
                $ortu->ortu_ibu_peru          = $r->ibu_perusahaan;
                $ortu->ortu_ibu_hp            = $r->ibu_hp;
                $ortu->ortu_ibu_wa            = $r->ibu_wa;
                $ortu->ortu_ibu_agama_id      = $r->ibu_agama;

                $ortu->provinsi_id            = $r->provinsi;
                $ortu->kota_id                = $r->kota;
                $ortu->kecamatan_id           = $r->kecamatan;
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
                $pnj->pnj_kerja_id          = $r->penjemput_kerja;
                $pnj->pnj_peru              = $r->penjemput_perusahaan;
                $pnj->pnj_hp                = $r->penjemput_hp;
                $pnj->pnj_wa                = $r->penjemput_wa;
                $pnj->pnj_agama_id          = $r->penjemput_agama;
                $pnj->pnj_pdk_id            = $r->penjemput_pdk;
                // $pnj->pnj_jekel             = $r->penjemput_jekel;
                $pnj->pnj_hub_id            = $r->penjemput_hubungan;
                $pnj->provinsi_id           = $r->provinsi;
                $pnj->kecamatan_id          = $r->kecamatan;
                $pnj->kota_id               = $r->kota;
                $pnj->pnj_alamat            = $r->alamat;

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

    public function edit(Request $r)
    {
        $id = $r->get('id');
        
        $data = CateringOrder::where('order_kode',$id)->first();
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
                        ->leftjoin('dapok_tb_anak AS cc','cc.anak_nis','=','aa.anak_nis')
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
                            ->leftjoin('dapok_tb_anak AS cc','cc.anak_nis','=','aa.anak_nis')
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
