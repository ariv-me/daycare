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

    public function save_daftar(Request $r){

        $transaction = DB::connection('daycare')->transaction(function() use($r){

            $app = SistemApp::sistem();
            $tmp = new Anak();
            $nis = Anak::autonumber();
        

            $tmp->ortu_id         = $r->ortu;
            $tmp->anak_kode        = $nis;
            $tmp->anak_nama       = $r->anak;
            $tmp->anak_tgl_lahir  = $r->anak_lahir;
            $tmp->anak_jekel      = $r->anak_jekel;

            $tmp->created_nip   = $app['kar_id'];
            $tmp->created_nama  = $app['kar_nama_awal'];
            $tmp->created_ip    = $r->ip();

            //dd($tmp);

            $tmp->save();

        });

        return response()->json($transaction);

    }


    public function save(Request $r){

        $result = array('success'=>false);

        try {

            $app       = SistemApp::sistem();
            $anak      = Anak::where('anak_kode',$r->nis)->where('anak_tgl_lahir',$r->anak_tgl_lahir)->where('void','T')->first();

            
            if ($anak != null) {
    
                $data = DB::connection('daycare')->transaction(function() use($r,$app,$anak){  

                    $nis = $anak->anak_kode;
                    $tmp = Anak::where('anak_kode',$nis)->first();
    
                    $tmp->ortu_id               = $r->ortu;
                    $tmp->anak_nama             = $r->anak_nama;
                    $tmp->anak_tmp_lahir        = $r->anak_tmp_lahir;
                    $tmp->anak_tgl_lahir        = date('Y-m-d', strtotime($r->anak_tgl_lahir));
                    $tmp->anak_jekel            = $r->anak_jekel;
                    $tmp->anak_ke               = $r->anak_ke;
                    $tmp->anak_jml_saudara      = $r->anak_saudara;
                    $tmp->agama_id              = $r->anak_agama;
                    $tmp->anak_alamat           = $r->anak_alamat;
                    $tmp->anak_berat            = $r->anak_berat;
                    $tmp->anak_tinggi           = $r->anak_tinggi;
                    
                    $tmp->updated_nip           = $app['kar_nip'];
                    $tmp->updated_nama          = $app['kar_nama_awal'];
                    $tmp->updated_ip            = $r->ip();

                    $tmp->save();
        
                    return true;
                });

                $status = '1';


            } else {

                $data = DB::connection('daycare')->transaction(function() use($r,$app,$anak){

                    $tmp = new Anak();
                    $nis = Anak::autonumber();
                    
                    $tmp->ortu_id               = $r->ortu;
                    $tmp->anak_nama             = $r->anak_nama;
                    $tmp->anak_kode              = $nis;
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

    public function view(Request $r){

        $result = array('success'=>false);

        try{
            
            $data = DB::connection('daycare')
                            ->table('dapok_tb_anak AS aa')
                            ->leftjoin('daftar_tb_ortu AS bb','bb.ortu_id','=','aa.ortu_id')
                            ->leftjoin('hcm_ta_agama AS cc','cc.agama_id','=','aa.agama_id')
                            ->orderby('bb.ortu_id','desc')
                            ->get();

            $data = $data->map(function($value) {

                $value->anak_usia = Carbon::parse($value->anak_tgl_lahir)->age;
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
        $result = array('success'=>false);

        try{
            $id = $r->get('id');
            $data = DB::connection('daycare')
                            ->table('dapok_tb_anak AS aa')
                            ->leftjoin('daftar_tb_ortu AS bb','bb.ortu_id','=','aa.ortu_id')
                            ->leftjoin('hcm_ta_agama AS cc','cc.agama_id','=','aa.agama_id')
                            ->where('anak_kode',$id)
                            ->first();


        } catch (\Exception $e) {
            $result['message'] = $e->getMessage();  
            return response()->json($result);
        }

        $result['success'] = true;
        $result['data'] = $data;

        return response()->json($result);
    }

}
