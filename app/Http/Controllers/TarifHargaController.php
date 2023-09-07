<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SistemApp;
use App\Helpers;
use Carbon\Carbon;

use DB;

use App\Models\TarifKategori;
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
            $tarif_kode = TarifHarga::autonumber();

            $tmp->tarif_kode   = $tarif_kode;
            $tmp->kat_id       = $r->kategori;
            $tmp->tarif_nama   = $r->nama;
            $tmp->tarif_reg    = str_replace(".", "", $r->registrasi);
            $tmp->tarif_gizi   = str_replace(".", "", $r->gizi);
            $tmp->tarif_spp    = str_replace(".", "", $r->bulanan);
            $tmp->tarif_pembg  = str_replace(".", "", $r->pembangunan);
            $tmp->tarif_total  = $tmp->tarif_reg + $tmp->tarif_gizi + $tmp->tarif_spp + $tmp->tarif_pembg;


            $tmp->created_nip  = $app['kar_nip'];
            $tmp->created_nama = $app['kar_nama_awal'];;
            $tmp->created_ip   = $r->ip();

            $tmp->save();

        });

        return response()->json($transaction);

    }

    public function view(Request $r){

        $result = array('success'=>false);

        try{
            
            $data = DB::connection('daycare')
                            ->table('tarif_tb_harga AS aa')
                            ->leftjoin('tarif_ta_kategori AS bb','bb.kat_id','=','aa.kat_id')
                            ->orderby('aa.tarif_kode','desc')
                            ->get();

            $data = $data->map(function($value) {
                


                $value->registrasi        = $value->tarif_reg;
                $value->spp               = $value->tarif_spp;
                $value->tahun             = 12;
                $value->pembangunan       = $value->tarif_pembg;
                $value->total_spp           = round($value->spp*$value->tahun);

                $value->reg_tampil          = format_rupiah($value->tarif_reg);
                $value->gizi_tampil         = format_rupiah($value->tarif_gizi);
                $value->spp_tampil          = format_rupiah($value->tarif_spp);
                $value->pembangunan_tampil  = format_rupiah($value->tarif_pembg);
                $value->total_bayar         = format_rupiah($value->tarif_total);

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
            
            $kategori = $r->kategori;
            $paket = $r->paket;
            $data = TarifHarga::where('kat_id',$kategori)->where('tarif_kode',$paket)->get();
    

            $data = $data->map(function($value) {
                
                $value->registrasi        = $value->tarif_reg;
                $value->spp               = $value->tarif_spp;
                $value->tahun             = 12;
                $value->pembangunan       = $value->tarif_pembg;
                $value->total_spp           = round($value->spp*$value->tahun);

                $value->reg_tampil          = format_rupiah($value->tarif_reg);
                $value->gizi_tampil         = format_rupiah($value->tarif_gizi);
                $value->spp_tampil          = format_rupiah($value->tarif_spp);
                $value->pembangunan_tampil  = format_rupiah($value->tarif_pembg);
                $value->total_spp_tampil    = format_rupiah(round($value->spp*$value->tahun),2);
                $value->total_bayar         = format_rupiah($value->tarif_total);

                
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
        $data = TarifHarga::where('tarif_kode',$id)->first();
        //dd($data);
        
        return response()->json($data);
    }

    public function get_tarif(Request $r)
    {
        $id = strtolower($r->get('id'));
        $data = TarifHarga::where('jenis_id',$id)->first();
               
        return response()->json($data);
    }

    public function update(Request $r){

        $transaction = DB::connection('daycare')->transaction(function() use($r){
  
              $app = SistemApp::sistem();
  
              $id = $r->get('id');
              $tmp = TarifHarga::where('tarif_kode',$id)->first();

              $tmp->kat_id       = $r->kategori;
              $tmp->tarif_nama   = $r->nama;
              $tmp->tarif_reg    = str_replace(".", "", $r->registrasi);
              $tmp->tarif_gizi   = str_replace(".", "", $r->gizi);
              $tmp->tarif_spp    = str_replace(".", "", $r->bulanan);
              $tmp->tarif_pembg  = str_replace(".", "", $r->pembangunan);
              $tmp->tarif_total  = $tmp->tarif_reg + $tmp->tarif_gizi + $tmp->tarif_spp + $tmp->tarif_pembg;

              $tmp->updated_nip         = $app['kar_nip'];
              $tmp->updated_nama        = $app['kar_nama_awal'];;
              $tmp->updated_ip          = $r->ip();
            
              $tmp->save();
  
              return true;
          });
  
          return response()->json($transaction);   
    }

    public function aktif(Request $r)
    {
        $transaction = DB::connection('daycare')->transaction(function() use($r){

            $app        = SistemApp::sistem();

            $id = $r->get('id');
            
            $tmp = TarifHarga::where('tarif_kode',$id)->first();
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
        $transaction = DB::connection('daycare')->transaction(function() use($r){

            $app        = SistemApp::sistem();
            $id         = $r->get('id');
            $tmp        = TarifHarga::where('tarif_kode',$id)->first();
                    
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
