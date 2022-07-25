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
use App\Models\Agama;

class AnakController extends Controller
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

    public function save(Request $r){

        //dd($r);

        $transaction = DB::connection('daycare')->transaction(function() use($r){

            $app = SistemApp::sistem();
            $tmp = new Anak();

            $nis = Anak::autonumber();

            $tmp->ortu_id               = $r->ortu;
            $tmp->anak_nama             = $r->anak_nama;
            $tmp->anak_nis              = $nis;
            $tmp->anak_tmp_lahir        = $r->anak_tmp_lahir;
            $tmp->anak_tgl_lahir        = date('Y-m-d', strtotime($r->anak_tgl_lahir));
            $tmp->anak_jekel            = $r->anak_jekel;
            $tmp->anak_ke               = $r->anak_ke;
            $tmp->anak_jml_saudara      = $r->anak_saudara;
            $tmp->agama_id              = $r->anak_agama;
            $tmp->anak_alamat           = $r->anak_alamat;
            $tmp->anak_berat            = $r->anak_berat;
            $tmp->anak_tinggi           = $r->anak_tinggi;
            
            $tmp->created_nip           = $app['kar_nip'];
            $tmp->created_nama           = $app['kar_nama_awal'];
            $tmp->created_ip = $r->ip();


   
            //dd($tmp);

            $tmp->save();


        });

        return response()->json($transaction);

    }

    public function view(Request $r){

        $result = array('success'=>false);

        try{
            
            $data = DB::connection('daycare')
                            ->table('tb_anak AS aa')
                            ->leftjoin('tb_ortu AS bb','bb.ortu_id','=','aa.ortu_id')
                            ->leftjoin('ta_agama AS cc','cc.agama_id','=','aa.agama_id')
                            ->orderby('bb.ortu_id')
                            ->get();

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
