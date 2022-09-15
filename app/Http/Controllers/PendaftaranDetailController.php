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

        $kosong      = PendaftaranDetail::where('kar_id',$app['kar_id'])->where('is_aktif','T')->delete();

        return view('pendaftaran.baru.index',compact('app','menu'));
    }

    public function dapok()
    {
        
        $app = SistemApp::sistem();
        $menu = SistemApp::OtoritasMenu($app['idu']);
        return view('pendaftaran.ortu_anak.index',compact('app','menu'));
    }

    public function view_detail(Request $r)
    {
       
        $result = array('success'=>false);

        try{

            $app = SistemApp::sistem();
            $kode = $r->get('kode');


            $data = DB::connection('daycare')
                        ->table('daftar_tc_transaksi_detail AS aa')
                        ->leftjoin('tarif_ta_jenis AS bb','bb.jenis_id','=','aa.jenis_id')
                        ->leftjoin('sistem_tb_grup AS cc','cc.grup_id','=','aa.grup_id')
                        ->where('aa.kar_id',$app['kar_id'])
                        ->where('aa.is_aktif','T')
                        ->orderby('aa.detail_id','desc')
                        ->get();


            $data = $data->map(function($value) {

                $value->registrasi       = format_rupiah($value->tarif_reg);
                $value->spp              = format_rupiah($value->tarif_spp);
                $value->pembangunan      = format_rupiah($value->tarif_pembg);
                $value->total            = format_rupiah($value->tarif_total);
                
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


    public function save_detail(Request $r){

        $result = array('success'=>false);

        try {

                $app         = SistemApp::sistem();
                $detail      = PendaftaranDetail::where('anak_nis',$r->daftar_nis)->where('kar_id',$app['kar_id'])->where('is_aktif','T')->first();


                if($detail != null ){

                    $data = DB::connection('daycare')->transaction(function() use($r,$app,$detail){
                        
                        $perusahaan = $r->perusahaan;
                        $jenis      = $r->jenis;

                        $grup = Perusahaan::where('grup_id',$perusahaan)->first()->grup_id;
                        $tarif = Tarif::where('jenis_id',$jenis)->where('grup_id',$grup)->first();
                    
                        $id = $detail->detail_id;
                        $tmp = PendaftaranDetail::where('detail_id',$id)->first();

                        $tmp->detail_blm              = $r->daftar_jenis;
                        $tmp->anak_nis              = $r->daftar_nis;
                        $tmp->anak_nama             = $r->daftar_anak;
                        $tmp->grup_id               = $grup;
                        $tmp->jenis_id              = $jenis;

                        if ( $jenis == '3'){

                            $tmp->anak_status       = 'C';
                           
                        } else {
                            $tmp->anak_status       = 'O';
                        }

                       
                        $tmp->tarif_kode            = $tarif->kode;
                        $tmp->tarif_reg             = $tarif->tarif_reg;
                        $tmp->tarif_spp             = $tarif->tarif_spp;
                        $tmp->tarif_pembg           = $tarif->tarif_pembg;
                        $tmp->kar_id                = $app['kar_id'];
                        $tmp->tarif_total           = $tarif->tarif_reg + $tarif->tarif_spp + $tarif->tarif_pembg;
            
                        $tmp->updated_nip   = $app['kar_nip'];
                        $tmp->updated_nama  = $app['kar_nama_awal'];
                        $tmp->updated_ip    = $r->ip();

                        dd($tmp);
            
                        $tmp->save();
            
                        return true;

                    });

                    $status = '1';

                } else {

                    $data = DB::connection('daycare')->transaction(function() use($r,$app,$detail){
                        
                        $perusahaan = $r->perusahaan;
                        $jenis      = $r->jenis;

                        $grup = Perusahaan::where('grup_id',$perusahaan)->first()->grup_id;
                        $tarif = Tarif::where('jenis_id',$jenis)->where('grup_id',$grup)->first();

                        $tmp = new PendaftaranDetail();

                        $tmp->detail_blm          = $r->daftar_jenis;
                        $tmp->anak_nis              = $r->daftar_nis;
                        $tmp->anak_nama             = $r->daftar_anak;
                        $tmp->grup_id               = $grup;
                        $tmp->jenis_id              = $jenis;


                        if ( $jenis == '3'){

                            $tmp->anak_status       = 'C';
                           
                        } else {
                            $tmp->anak_status       = 'O';
                        }


                        $tmp->tarif_kode            = $tarif->kode;
                        $tmp->tarif_reg             = $tarif->tarif_reg;
                        $tmp->tarif_spp             = $tarif->tarif_spp;
                        $tmp->tarif_pembg           = $tarif->tarif_pembg;
                        $tmp->kar_id                = $app['kar_id'];
                        $tmp->tarif_total           = $tarif->tarif_reg + $tarif->tarif_spp + $tarif->tarif_pembg;
            
                        $tmp->created_nip   = $app['kar_nip'];
                        $tmp->created_nama  = $app['kar_nama_awal'];
                        $tmp->created_ip    = $r->ip();
            
                        $tmp->save();

                        return true;
            
                    });

                    $status = '2';

                }       


        } catch (\Exception $e) {
            $result['message'] = $e->getMessage();  
            return response()->json($result);
        }

        $result['success'] = true;
        $result['status'] = $status;

        return response()->json($result);
           
    }

    public function edit_detail(Request $r)
    {

        $result = array('success'=>false);

        try{
            $id = $r->get('id');
            $data = DB::connection('daycare')
                            ->table('daftar_tc_transaksi_detail AS aa')
                            ->leftjoin('daftar_tb_anak AS bb','bb.anak_nis','=','aa.anak_nis')
                            ->leftjoin('daftar_tb_ortu AS cc','cc.ortu_id','=','bb.ortu_id')
                            ->where('aa.detail_id',$id)
                            ->first();


        } catch (\Exception $e) {
            $result['message'] = $e->getMessage();  
            return response()->json($result);
        }

        $result['success'] = true;
        $result['data'] = $data;

        return response()->json($result);

    }

    public function delete_detail(Request $r){


        $id =$r->get('id');
        $data = PendaftaranDetail::where('detail_id',$id)->delete();
        
        return response()->json($data);

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
