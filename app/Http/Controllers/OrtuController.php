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
use App\Models\Ortu;
use App\Models\Perusahaan;
use App\Models\SistemAgama;

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

        $result = array('success'=>false);

        try {

            $app       = SistemApp::sistem();
            $ortu      = Ortu::where('ortu_ayah_hp',$r->ayah_hp)->where('ortu_ibu_hp',$r->ibu_hp)->where('void','T')->first();

            if ($ortu != null) {
    
                $data = DB::connection('mysql')->transaction(function() use($r,$app,$ortu){  

                    $id = $ortu->ortu_id;
                    $tmp = Ortu::where('ortu_id',$id)->first();
    
                    $tmp->ortu_ayah               = $r->ayah_nama;
                    $tmp->ortu_ayah_lahir         = $r->ayah_lahir;
                    $tmp->ortu_ayah_kerja         = $r->ayah_kerja;
                    $tmp->ortu_ayah_peru_id       = $r->ayah_perusahaan;
                    $tmp->ortu_ayah_hp            = $r->ayah_hp;
                    $tmp->ortu_ayah_wa            = $r->ayah_wa;
                    $tmp->ortu_ayah_alamat        = $r->ayah_alamat;
                    $tmp->ortu_ayah_agama_id      = $r->ayah_agama;
        
                    $tmp->ortu_ibu               = $r->ibu_nama;
                    $tmp->ortu_ibu_lahir         = $r->ibu_lahir;
                    $tmp->ortu_ibu_kerja         = $r->ibu_kerja;
                    $tmp->ortu_ibu_peru_id       = $r->ibu_perusahaan;
                    $tmp->ortu_ibu_hp            = $r->ibu_hp;
                    $tmp->ortu_ibu_wa            = $r->ibu_wa;
                    $tmp->ortu_ibu_alamat        = $r->ibu_alamat;
                    $tmp->ortu_ibu_agama_id      = $r->ibu_agama;
        
        
                    $tmp->created_nip           = $app['kar_nip'];
                    $tmp->created_nama          = $app['kar_nama_awal'];
                    $tmp->created_ip            = $r->ip();

                    $tmp->save();
        
                    return true;
                });

                $status = '1';


            } else {

                $data = DB::connection('mysql')->transaction(function() use($r,$app,$ortu){

                    $tmp = new Ortu();
    
                    $tmp->ortu_ayah               = $r->ayah_nama;
                    $tmp->ortu_ayah_lahir         = $r->ayah_lahir;
                    $tmp->ortu_ayah_kerja         = $r->ayah_kerja;
                    $tmp->ortu_ayah_peru_id     = $r->ayah_perusahaan;
                    $tmp->ortu_ayah_hp            = $r->ayah_hp;
                    $tmp->ortu_ayah_wa            = $r->ayah_wa;
                    $tmp->ortu_ayah_alamat        = $r->ayah_alamat;
                    $tmp->ortu_ayah_agama_id    = $r->ayah_agama;
        
                    $tmp->ortu_ibu               = $r->ibu_nama;
                    $tmp->ortu_ibu_lahir         = $r->ibu_lahir;
                    $tmp->ortu_ibu_kerja         = $r->ibu_kerja;
                    $tmp->ortu_ibu_peru_id     = $r->ibu_perusahaan;
                    $tmp->ortu_ibu_hp            = $r->ibu_hp;
                    $tmp->ortu_ibu_wa            = $r->ibu_wa;
                    $tmp->ortu_ibu_alamat        = $r->ibu_alamat;
                    $tmp->ortu_ibu_agama_id    = $r->ibu_agama;
        
        
                    $tmp->created_nip           = $app['kar_nip'];
                    $tmp->created_nama          = $app['kar_nama_awal'];
                    $tmp->created_ip            = $r->ip();

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

        // $transaction = DB::connection('daycare')->transaction(function() use($r){

        //     $app = SistemApp::sistem();
        //     $tmp = new Ortu();

        //     $tmp->ortu_ayah               = $r->ayah_nama;
        //     $tmp->ortu_ayah_lahir         = $r->ayah_lahir;
        //     $tmp->ortu_ayah_kerja         = $r->ayah_kerja;
        //     $tmp->ortu_ayah_peru_id     = $r->ayah_perusahaan;
        //     $tmp->ortu_ayah_hp            = $r->ayah_hp;
        //     $tmp->ortu_ayah_wa            = $r->ayah_wa;
        //     $tmp->ortu_ayah_alamat        = $r->ayah_alamat;
        //     $tmp->ortu_ayah_agama_id    = $r->ayah_agama;

        //     $tmp->ortu_ibu               = $r->ibu_nama;
        //     $tmp->ortu_ibu_lahir         = $r->ibu_lahir;
        //     $tmp->ortu_ibu_kerja         = $r->ibu_kerja;
        //     $tmp->ortu_ibu_peru_id     = $r->ibu_perusahaan;
        //     $tmp->ortu_ibu_hp            = $r->ibu_hp;
        //     $tmp->ortu_ibu_wa            = $r->ibu_wa;
        //     $tmp->ortu_ibu_alamat        = $r->ibu_alamat;
        //     $tmp->ortu_ibu_agama_id    = $r->ibu_agama;


        //     $tmp->created_nip           = $app['kar_nip'];
        //     $tmp->created_nama          = $app['kar_nama_awal'];
        //     $tmp->created_ip            = $r->ip();
            
        //     //dd($tmp);

        //     $tmp->save();


        // });

        // return response()->json($transaction);

    }

    public function view(Request $r){

        $result = array('success'=>false);

        try{

          

           // dd($usia);
            
            $data = DB::connection('daycare')
                            ->table('tb_ortu AS aa')
                            ->orderby('aa.ortu_id','desc')
                            ->get();


            $data = $data->map(function($value) {

                $value->ayah_usia = Carbon::parse($value->ortu_ayah_lahir)->age;
                $value->ibu_usia = Carbon::parse($value->ortu_ibu_lahir)->age;

                $value->ibu_agama   = SistemAgama::where('agama_id',$value->ortu_ibu_agama_id)->first()->agama_nama;
                $value->ayah_agama   = SistemAgama::where('agama_id',$value->ortu_ayah_agama_id)->first()->agama_nama;
                
                $value->ayah_kerja   = Perusahaan::where('peru_id',$value->ortu_ayah_peru_id)->first()->peru_nama;
                $value->ibu_kerja   = Perusahaan::where('peru_id',$value->ortu_ibu_peru_id)->first()->peru_nama;

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
        $id = $r->get('id');

        //dd($id);

        $data = Ortu::where('ortu_id',$id)->first();

        $result = array();
        $result['data']    = $data;

       

       return response()->json($result);
    }


}
