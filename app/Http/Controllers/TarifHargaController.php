<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SistemApp;
use App\Helpers;
use Carbon\Carbon;

use DB;

use App\Models\Grup;
use App\Models\TarifHarga;
use App\Models\Perusahaan;

class TarifHargaController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        
        $app = SistemApp::sistem();
        $menu = SistemApp::OtoritasMenu($app['idu']);
        return view('tarif.harga.index',compact('app','menu'));
    }

    
    public function save(Request $r){

        $transaction = DB::connection('daycare')->transaction(function() use($r){

            $app = SistemApp::sistem();
            $tmp = new TarifHarga();
            $kode_harga = TarifHarga::autonumber();

            $tmp->kode         = $kode_harga;
            $tmp->grup_id      = $r->grup;
            $tmp->jenis_id     = $r->jenis;
            $tmp->tarif_reg    = $r->registrasi;
            $tmp->tarif_spp    = $r->bulanan;
            $tmp->tarif_pembg  = $r->pembangunan;

            $tmp->created_nip          = $app['kar_nip'];
            $tmp->created_nama         = $app['kar_nama_awal'];;
            $tmp->created_ip           = $r->ip();

            $tmp->save();

        });

        return response()->json($transaction);

    }

    public function view(Request $r){

        $result = array('success'=>false);

        try{
            
            $data = DB::connection('daycare')
                            ->table('tarif_tb_harga AS aa')
                            ->leftjoin('tarif_ta_jenis AS bb','bb.jenis_id','=','aa.jenis_id')
                            ->leftjoin('sistem_tb_grup AS cc','cc.grup_id','=','aa.grup_id')
                            ->orderby('kode','desc')
                            ->get();

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
                
                $value->total_bayar         = format_rupiah(round($value->registrasi+$value->spp+$value->pembangunan),2);

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

    public function view_transaksi(Request $r){

        $result = array('success'=>false);

        try{
            
            $perusahaan = $r->perusahaan;
            $jenis      = $r->jenis;
            $grup = Perusahaan::where('grup_id',$perusahaan)->first()->grup_id;


            $data = TarifHarga::where('jenis_id',$jenis)->where('grup_id',$grup)->get();

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
        $data = TarifHarga::where('kode',$id)->first();
        return response()->json($data);
    }

    public function aktif(Request $r)
    {
        $transaction = DB::connection('mysql')->transaction(function() use($r){

            $app        = SistemApp::sistem();

            $id = $r->get('id');
            
            $tmp = TarifHarga::where('kode',$id)->first();
            $tmp->void              = 'T';
            $tmp->void_nip          = $app['kar_nip'];
            $tmp->void_nama         = $app['kar_nama_awal'];;
            $tmp->void_ip           = $r->ip();
            $tmp->save();

            return true;
        });

        return response()->json($transaction);   
    }
    
    public function nonaktif(Request $r)
    {
        $transaction = DB::connection('mysql')->transaction(function() use($r){

            $app        = SistemApp::sistem();
            $id         = $r->get('id');
            $tmp        = TarifHarga::where('kode',$id)->first();
                    
            $tmp->void              = 'Y';
            $tmp->void_nip          = $app['kar_nip'];
            $tmp->void_nama         = $app['kar_nama_awal'];;
            $tmp->void_ip           = $r->ip();
            $tmp->save();

            return true;
        });

        return response()->json($transaction);   
    }


}
