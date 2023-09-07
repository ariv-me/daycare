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



class PendaftaranTagihanController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        
        $app = SistemApp::sistem();
        $menu = SistemApp::OtoritasMenu($app['idu']);
        return view('pendaftaran.tagihan.index',compact('app','menu'));
    }

   

    public function view(Request $r){

        $result = array('success'=>false);

        try{

            
            $data = DB::connection('daycare')
                            ->table('dapok_tb_anak AS aa')          
                            ->leftjoin('dapok_tb_ortu AS bb','bb.ortu_kode','aa.ortu_kode')              
                            ->leftjoin('dapok_tb_penjemput AS cc','cc.pnj_kode','aa.pnj_kode')              
                            ->leftjoin('daftar_tc_transaksi AS dd','dd.anak_kode','aa.anak_kode')              
                            ->leftjoin('tarif_tb_harga AS ee','ee.tarif_kode','dd.tarif_kode')              
                            ->orderby('aa.anak_id','desc')
                            ->get();

                $data = $data->map(function($value) {

                    $value->edit = route('pendaftaran.transaksi.edit_view', $value->anak_kode); 

                    $value->anak_tgl_lahir = format_indo($value->anak_tgl_lahir);
                    $value->tarif_total    = format_rupiah($value->tarif_total);

                if($value->anak_jekel == 'L'){
                    $value->anak_jekel = 'Laki - Laki';
                }
                else if($value->anak_jekel == 'P'){
                    $value->anak_jekel = 'Perempuan';
                }
                 
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

}
