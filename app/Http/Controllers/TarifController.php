<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SistemApp;
use App\Helpers;
use Carbon\Carbon;

use DB;

use App\Models\TarifItem;
use App\Models\TarifKategori;
use App\Models\Tarif;
use App\Models\TarifDetail;

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
        return view('tarif.paket.index',compact('app','menu'));
    }

    
    public function save(Request $r){

        $transaction = DB::connection('daycare')->transaction(function() use($r){

            $app = SistemApp::sistem();
            $tmp = new Tarif();
            $tarif_kode = Tarif::autonumber();
            $tarif_total = TarifDetail::where('tarif_kode',null)->where('detail_aktif','Y')->sum('detail_total');

            $tmp->tarif_kode   = $tarif_kode;
            $tmp->jenis_kode   = $r->jenis;
            $tmp->kat_kode   = $r->kategori;
            $tmp->grup_kode   = $r->grup;
            $tmp->tarif_nama   = $r->nama;
            $tmp->tarif_total   = $tarif_total;


            $tmp->created_nip  = $app['kar_nip'];
            $tmp->created_nama = $app['kar_nama_awal'];;
            $tmp->created_ip   = $r->ip();

            $tmp->save();

            $detail = TarifDetail::where('tarif_kode',null)->where('detail_aktif','Y')->get();


            foreach ($detail as $key => $value) {

                $sql = DB::connection('daycare')
                            ->table('tarif_tc_tarif_detail')
                            ->where('detail_aktif','Y')
                            ->where('tarif_kode',null)
                            ->update([
                                'tarif_kode' => $tarif_kode,
                            ]);
            }

        });

        return response()->json($transaction);

    }

    public function update(Request $r){

        $transaction = DB::connection('daycare')->transaction(function() use($r){
  
            $app = SistemApp::sistem();

            $id = $r->get('id');
            $tmp = Tarif::where('tarif_kode',$id)->first();
            $tarif_total = TarifDetail::where('tarif_kode',$id)->where('detail_aktif','Y')->sum('detail_total');

            $tmp->jenis_kode   = $r->jenis;
            $tmp->kat_kode     = $r->kategori;
            $tmp->grup_kode    = $r->grup;
            $tmp->tarif_nama   = $r->nama;
            $tmp->tarif_total  = $tarif_total;

            $tmp->created_nip  = $app['kar_nip'];
            $tmp->created_nama = $app['kar_nama_awal'];;
            $tmp->created_ip   = $r->ip();

            $tmp->save();

            return true;

          });
  
          return response()->json($transaction);   
    }

    public function view(Request $r){

        $result = array('success'=>false);

        try{
            
            $data = DB::connection('daycare')
                            ->table('tarif_tc_tarif AS aa')
                            ->leftjoin('tarif_ta_kategori AS bb','bb.kat_kode','=','aa.kat_kode')
                            ->leftjoin('tarif_ta_jenis AS cc','cc.jenis_kode','=','aa.jenis_kode')
                            ->leftjoin('sistem_tb_grup AS dd','dd.grup_kode','=','aa.grup_kode')
                            ->orderby('aa.tarif_kode','desc')
                            ->get();

            $data = $data->map(function($value) {
                
                $value->total         = format_rupiah(TarifDetail::where('tarif_kode',$value->tarif_kode)->sum('detail_total'));
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

    public function detail_save(Request $r){

        $transaction = DB::connection('daycare')->transaction(function() use($r){

            $app = SistemApp::sistem();
            $tmp = new TarifDetail();

            $item = TarifItem::where('item_id',$r->item)->first();

            $tmp->tarif_kode    = $r->kode;
            $tmp->item_kode     = $item->item_kode;
            $tmp->detail_nama   = $item->item_nama;
            $tmp->detail_total  = $item->item_nominal;

            $tmp->created_nip  = $app['kar_nip'];
            $tmp->created_nama = $app['kar_nama_awal'];;
            $tmp->created_ip   = $r->ip();

            $tmp->save();

        });

        return response()->json($transaction);

    }

    public function detail_view(Request $r){

        $result = array('success'=>false);

        try{

            $id = $r->id;
            
            if ($id == null){
                $data = DB::connection('daycare')
                            ->table('tarif_tc_tarif_detail AS aa')
                            ->leftjoin('tarif_tb_item AS bb','bb.item_kode','=','aa.item_kode')
                            ->where('aa.detail_aktif','Y')
                            ->where('aa.tarif_kode',null)
                            ->orderby('aa.detail_id')
                            ->get();
            } else {
                $data = DB::connection('daycare')
                            ->table('tarif_tc_tarif_detail AS aa')
                            ->leftjoin('tarif_tb_item AS bb','bb.item_kode','=','aa.item_kode')
                            ->where('aa.detail_aktif','Y')
                            ->where('aa.tarif_kode',$id)
                            ->orderby('aa.detail_id')
                            ->get();
            }

            $data = $data->map(function($value) {
            
                $value->nominal  = format_rupiah($value->detail_total);

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

    public function detail_nonaktif(Request $r){
  
        $transaction = DB::connection('daycare')->transaction(function() use($r){ 
            
            $app = SistemApp::sistem();

            $id  = $r->get('id');
            $tmp = TarifDetail::where('detail_id',$id)->first();
            $tmp->delete();

            return true;
        });

        return response()->json($transaction);
  }

    public function view_transaksi(Request $r){

        $result = array('success'=>false);

        try{
            
            $kategori = $r->kategori;
            $paket = $r->paket;

            $data = DB::connection('daycare')
                            ->table('tarif_tc_tarif AS aa')
                            ->leftjoin('tarif_tc_tarif_detail AS bb','bb.tarif_kode','=','aa.tarif_kode')
                            ->leftjoin('tarif_tb_item AS cc','cc.item_kode','=','bb.item_kode')
                            ->where('aa.tarif_kode',$paket)
                            ->get();  

            $data = $data->map(function($value) {

                $value->detail_total_tampil = format_rupiah($value->detail_total);
                $value->tarif_total         = format_rupiah(TarifDetail::where('tarif_kode',$value->tarif_kode)->sum('detail_total'));
               
                return $value;
           
            });

        } catch (\Exception $e) {
            $result['message'] = $e->getMessage();  
            return response()->json($result);
        }

        $result['success'] = true;
        $result['data'] = $data;
        $result['total_tarif'] = format_rupiah($data->sum('detail_total'));


        return response()->json($result);

    }

    public function edit(Request $r)
    {
        $id = strtolower($r->get('id'));
        $data = Tarif::where('tarif_kode',$id)->first();

        return response()->json($data);
    }

    public function get_tarif(Request $r)
    {
        $id = strtolower($r->get('id'));
        $data = Tarif::where('jenis_id',$id)->first();
               
        return response()->json($data);
    }

  

    public function aktif(Request $r)
    {
        $transaction = DB::connection('daycare')->transaction(function() use($r){

            $app        = SistemApp::sistem();

            $id = $r->get('id');
            
            $tmp = Tarif::where('tarif_kode',$id)->first();
            $tmp->tarif_aktif       = 'Y';
            $tmp->updated_nip          = $app['kar_nip'];
            $tmp->updated_nama         = $app['kar_nama_awal'];;
            $tmp->updated_ip           = $r->ip();
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
            $tmp        = Tarif::where('tarif_kode',$id)->first();
                    
            $tmp->tarif_aktif          = 'T';
            $tmp->updated_nip          = $app['kar_nip'];
            $tmp->updated_nama         = $app['kar_nama_awal'];;
            $tmp->updated_ip           = $r->ip();
            $tmp->save();

            return true;
        });

        return response()->json($transaction);   
    }


}
