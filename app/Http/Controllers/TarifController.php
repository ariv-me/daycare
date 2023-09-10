<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SistemApp;
use App\Helpers;
use Carbon\Carbon;

use DB;

use App\Models\Pendaftaran;
use App\Models\Grup;
use App\Models\Perusahaan;
use App\Models\Anak;
use App\Models\PendaftaranWali;
use App\Models\Tarif;

class TarifController extends Controller
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

    public function view(Request $r){

        $result = array('success'=>false);

        try{
            
            $perusahaan = $r->perusahaan;
            $jenis      = $r->jenis;
            $grup = Perusahaan::where('grup_id',$perusahaan)->first()->grup_id;


            $data = Tarif::where('jenis_id',$jenis)->where('grup_id',$grup)->get();

            $data = $data->map(function($value) {
                


                $value->registrasi        = $value->tarif_reg;
                $value->spp               = $value->tarif_spp;
                $value->tahun             = 12;
                $value->pembangunan       = $value->tarif_pembg;
                $value->total_spp           = round($value->spp*$value->tahun);

                $value->reg_tampil          = format_rupiah($value->tarif_reg);
                $value->spp_tampil          = format_rupiah($value->tarif_spp);
                $value->pembangunan_tampil  = format_rupiah($value->tarif_pembg);
                $value->total_spp_tampil    = format_rupiah(round($value->spp*$value->tahun),2);
                
                $value->total_bayar         = format_rupiah(round($value->registrasi+$value->total_spp+$value->pembangunan),2);

                //dd($value->total_bayar);
                
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
        $id = strtolower($r->get('id'));
        $data = Tarif::where('paket_kode',$id)->first();
        return response()->json($data);
    }

    public function aktif(Request $r)
    {
        $transaction = DB::connection('daycare')->transaction(function() use($r){

            $id = $r->get('id');
            $tmp = TarifKategori::where('kat_id',$id)->first();
            $tmp->kat_aktif  = 'Y';
            $tmp->save();

            return true;
        });

        return response()->json($transaction);   
    }
    
    public function nonaktif(Request $r)
    {
        $transaction = DB::connection('daycare')->transaction(function() use($r){

            $id = $r->get('id');
            $tmp = TarifKategori::where('kat_id',$id)->first();
            $tmp->kat_aktif  = 'T';
            $tmp->save();

            return true;
        });

        return response()->json($transaction);   
    }


}
