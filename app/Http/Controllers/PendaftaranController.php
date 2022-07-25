<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SistemApp;
use App\Helpers;
use Carbon\Carbon;

use DB;

use App\Models\Pendaftaran;
use App\Models\Grup;
use App\Models\Anak;
use App\Models\PendaftaranWali;
use App\Models\Perusahaan;
use App\Models\Tarif;
use App\Models\Agama;
use App\Models\Ortu;
use App\Models\JenisPekerjaan;
use App\Models\HCISKaryawan;


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
        return view('pendaftaran.baru.index',compact('app','menu'));
    }

    public function ortu_anak()
    {
        
        $app = SistemApp::sistem();
        $menu = SistemApp::OtoritasMenu($app['idu']);
        return view('pendaftaran.ortu_anak.index',compact('app','menu'));
    }

    public function view(Request $r)
    {
       
        $result = array('success'=>false);

        try{

            $app = SistemApp::sistem();
            $kode = $r->get('kode');

            if($kode == null){

                $data = DB::connection('daycare')
                                ->table('tc_daftar AS aa')
                                ->leftjoin('tb_jenis AS bb','bb.jenis_id','=','aa.jenis_id')
                                ->leftjoin('tb_grup AS cc','cc.grup_id','=','aa.grup_id')
                                ->where('aa.kar_id',$app['kar_id'])
                                ->where('aa.is_aktif','T')
                                ->get();
            } else {

                $data = DB::connection('daycare')
                                ->table('tc_daftar AS aa')
                                ->leftjoin('tb_jenis AS bb','bb.jenis_id','=','aa.jenis_id')
                                ->leftjoin('tb_grup AS cc','cc.grup_id','=','aa.grup_id')
                                ->where('aa.daftar_kode',$kode)
                                ->orderby('aa.daftar_kode')
                                ->get();

            }
                        
        } catch(\Exeption $e) {
            $result['message'] = $e->getMessage();
            return response()->json($result);
        }

            $result['success'] = true;
            $result['data'] = $data;

            // $tanggal_mulai = $tanggal_mulai;
            // $tanggal_akhir = $tanggal_akhir;

            // $result['export_excel'] = $app['url'].'ysp_kerohanian/export_daftar_kunjungan/'.$tanggal_mulai.'/'.$tanggal_akhir;

            return response()->json($result);

    }


    public function save(Request $r){

        //dd($r);

        $transaction = DB::connection('daycare')->transaction(function() use($r){

            $app = SistemApp::sistem();
            $tmp = new Pendaftaran();

            $perusahaan = $r->perusahaan;
            $jenis      = $r->jenis;

            $grup = Perusahaan::where('grup_id',$perusahaan)->first()->grup_id;
            $tarif = Tarif::where('jenis_id',$jenis)->where('grup_id',$grup)->first();

            $kode_daftar = Pendaftaran::daftar_kode();
            
            //d($kode_daftar);
            //dd($tarif);
        
            $tmp->daftar_kode           = $kode_daftar;
            $tmp->anak_nis              = $r->daftar_nis;
            $tmp->anak_nama             = $r->daftar_anak;
            $tmp->grup_id               = $grup;
            $tmp->jenis_id              = $jenis;
            $tmp->tarif_kode            = $tarif->kode;
            $tmp->tarif_reg             = $tarif->tarif_reg;
            $tmp->tarif_spp             = $tarif->tarif_spp;
            $tmp->tarif_pembg           = $tarif->tarif_pembg;

            $tmp->kar_id                = $app['kar_id'];

        
            //dd($tmp);

            $tmp->save();


        });

        return response()->json($transaction);

    }

    public function anak(Request $r){

        //dd($r);

        $transaction = DB::connection('daycare')->transaction(function() use($r){

            $app = SistemApp::sistem();
            $tmp = new Anak();

            $nis = Anak::autonumber();

            $tmp->anak_nama             = $r->anak_nama;
            $tmp->anak_nis              = $nis;
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
