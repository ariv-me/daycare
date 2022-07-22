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

    // public function index()
    // {
        
    //     $app = SistemApp::sistem();
    //     $menu = SistemApp::OtoritasMenu($app['idu']);
    //     return view('pendaftaran.baru.index',compact('app','menu'));
    // }

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

    public function view(Request $r){

        $result = array('success'=>false);

        try{
            
            $perusahaan = $r->perusahaan;
            $jenis      = $r->jenis;

            $grup = Perusahaan::where('grup_id',$perusahaan)->first()->grup_id;
            $data = Tarif::where('jenis_id',$jenis)->where('grup_id',$grup)->get();

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
        $data = Tarif::where('tarif_kode',$id)->first();
        return response()->json($data);
    }


}
