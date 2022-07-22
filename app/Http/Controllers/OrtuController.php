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
use App\Models\Ortu;

class OrtuController extends Controller
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

    public function save (Request $r){

        //dd($r);

        $transaction = DB::connection('daycare')->transaction(function() use($r){

            $app = SistemApp::sistem();
            $tmp = new Ortu();

            $tmp->ortu_ayah               = $r->ayah_nama;
            $tmp->ortu_ayah_lahir         = $r->ayah_lahir;
            $tmp->ortu_ayah_kerja         = $r->ayah_kerja;
            $tmp->ortu_ayah_peru_id       = $r->ayah_perusahaan;
            $tmp->ortu_ayah_hp            = $r->ayah_hp;
            $tmp->ortu_ayah_wa            = $r->ayah_wa;
            $tmp->ortu_ayah_alamat        = $r->ayah_alamat;
            $tmp->ortu_agama_ayah         = $r->ayah_agama;

            $tmp->ortu_ibu               = $r->ibu_nama;
            $tmp->ortu_ibu_lahir         = $r->ibu_lahir;
            $tmp->ortu_ibu_kerja         = $r->ibu_kerja;
            $tmp->ortu_ibu_peru_id       = $r->ibu_perusahaan;
            $tmp->ortu_ibu_hp            = $r->ibu_hp;
            $tmp->ortu_ibu_wa            = $r->ibu_wa;
            $tmp->ortu_ibu_alamat        = $r->ibu_alamat;
            $tmp->ortu_agama_ibu         = $r->ibu_agama;


            $tmp->created_nip           = $app['kar_nip'];
            $tmp->created_nama           = $app['kar_nama_awal'];
            $tmp->created_ip            = $r->ip();
            
            //dd($tmp);

            $tmp->save();


        });

        return response()->json($transaction);

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
        $id = strtolower($r->get('id'));
        $data = Anak::where('anak_nis',$id)->first();
        return response()->json($data);
    }


}
