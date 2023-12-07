<?php

namespace App\Http\Controllers;

use App\Models\SistemGrup;
use App\Models\SistemGrupDetail;
use Illuminate\Http\Request;
use App\Models\SistemApp;
use App\Helpers;
use Carbon\Carbon;

use DB;

use App\Models\Member;

class MemberController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        
        $app = SistemApp::sistem();
        $menu = SistemApp::OtoritasMenu($app['idu']);
        return view('member.index',compact('app','menu'));
    }


    public function view(Request $r){

        $result = array('success'=>false);

        try{

            $kategori  = $r->get('kategori');
            $grup = $r->get('grup');

            if ($kategori === 'Semua') {

                if ($grup === 'Semua') {

                    $data = DB::connection('daycare')
                                    ->table('daftar_tc_member AS aa')      
                                    ->select(

                                        'aa.member_id',
                                        'aa.anak_kode',
                                        'aa.periode_id',
                                        'aa.tarif_kode',
                                        'aa.grup_kode',
                                        'aa.kat_kode',
                                        'aa.member_tgl',
                                        'aa.member_aktif',
                                        'aa.created_at',
                                        
                                        'bb.anak_kode',
                                        'bb.anak_id',
                                        'bb.anak_aktif',
                                        'bb.anak_nama',
                                        'bb.anak_jekel',
                                        'bb.anak_tgl_lahir',
                                        
                                        'ee.tarif_kode',
                                        'ee.tarif_nama',

                                        'gg.kat_kode',
                                        'gg.kat_nama',

                                        'hh.grup_nama',
                                    )    

                                    ->leftjoin('dapok_tb_anak AS bb','bb.anak_kode','aa.anak_kode')           
                                    ->leftjoin('dapok_tb_ortu AS cc','cc.ortu_kode','bb.ortu_kode')              
                                    ->leftjoin('dapok_tb_penjemput AS dd','dd.pnj_kode','bb.pnj_kode')              
                                    ->leftjoin('tarif_tc_tarif AS ee','ee.tarif_kode','aa.tarif_kode')       
                                    ->leftjoin('tarif_ta_kategori AS gg','gg.kat_kode','aa.kat_kode')   
                                    ->leftjoin('sistem_tb_grup AS hh','hh.grup_kode','aa.grup_kode')  
                                    ->orderby('aa.member_id','asc')
                                    ->get();

                } else {

                    $data = DB::connection('daycare')
                                    ->table('daftar_tc_member AS aa')      
                                    ->select(
                                        'aa.member_id',
                                        'aa.anak_kode',
                                        'aa.periode_id',
                                        'aa.tarif_kode',
                                        'aa.grup_kode',
                                        'aa.kat_kode',
                                        'aa.member_tgl',
                                        'aa.member_aktif',
                                        'aa.created_at',
                                        
                                        'bb.anak_kode',
                                        'bb.anak_id',
                                        'bb.anak_aktif',
                                        'bb.anak_nama',
                                        'bb.anak_jekel',
                                        'bb.anak_tgl_lahir',
                                        
                                        'ee.tarif_kode',
                                        'ee.tarif_nama',

                                        'gg.kat_kode',
                                        'gg.kat_nama',

                                        'hh.grup_nama',
                                    )    

                                    ->leftjoin('dapok_tb_anak AS bb','bb.anak_kode','aa.anak_kode')           
                                    ->leftjoin('dapok_tb_ortu AS cc','cc.ortu_kode','bb.ortu_kode')              
                                    ->leftjoin('dapok_tb_penjemput AS dd','dd.pnj_kode','bb.pnj_kode')              
                                    ->leftjoin('tarif_tc_tarif AS ee','ee.tarif_kode','aa.tarif_kode')       
                                    ->leftjoin('tarif_ta_kategori AS gg','gg.kat_kode','aa.kat_kode')   
                                    ->leftjoin('sistem_tb_grup AS hh','hh.grup_kode','aa.grup_kode')  
                                    ->where('aa.kat_kode',$kategori)
                                    ->orderby('aa.member_id','asc')
                                    ->get();

                }

            } else {
                if ($grup === 'Semua') {
                    $data = DB::connection('daycare')
                                    ->table('daftar_tc_member AS aa')      
                                    ->select(
                                        'aa.member_id',
                                        'aa.anak_kode',
                                        'aa.periode_id',
                                        'aa.tarif_kode',
                                        'aa.grup_kode',
                                        'aa.kat_kode',
                                        'aa.member_tgl',
                                        'aa.member_aktif',
                                        'aa.created_at',
                                        
                                        'bb.anak_kode',
                                        'bb.anak_id',
                                        'bb.anak_aktif',
                                        'bb.anak_nama',
                                        'bb.anak_jekel',
                                        'bb.anak_tgl_lahir',
                                        
                                        'ee.tarif_kode',
                                        'ee.tarif_nama',

                                        'gg.kat_kode',
                                        'gg.kat_nama',

                                        'hh.grup_nama',
                                    )    

                                    ->leftjoin('dapok_tb_anak AS bb','bb.anak_kode','aa.anak_kode')           
                                    ->leftjoin('dapok_tb_ortu AS cc','cc.ortu_kode','bb.ortu_kode')              
                                    ->leftjoin('dapok_tb_penjemput AS dd','dd.pnj_kode','bb.pnj_kode')              
                                    ->leftjoin('tarif_tc_tarif AS ee','ee.tarif_kode','aa.tarif_kode')       
                                    ->leftjoin('tarif_ta_kategori AS gg','gg.kat_kode','aa.kat_kode')   
                                    ->leftjoin('sistem_tb_grup AS hh','hh.grup_kode','aa.grup_kode')  
                                    ->where('aa.grup_kode',$grup)
                                    ->orderby('aa.member_id','asc')
                                    ->get();
                } else {
                    $data = DB::connection('daycare')
                                    ->table('daftar_tc_member AS aa')      
                                    ->select(
                                        'aa.member_id',
                                        'aa.anak_kode',
                                        'aa.trs_kode',
                                        'aa.periode_id',
                                        'aa.tarif_kode',
                                        'aa.grup_kode',
                                        'aa.kat_kode',
                                        'aa.member_aktif',
                                        'aa.member_tgl',
                                        'aa.created_at',
                                        
                                        'bb.anak_kode',
                                        'bb.anak_id',
                                        'bb.anak_aktif',
                                        'bb.anak_nama',
                                        'bb.anak_jekel',
                                        'bb.anak_tgl_lahir',
                                        
                                        'ee.tarif_kode',
                                        'ee.tarif_nama',

                                        'gg.kat_kode',
                                        'gg.kat_nama',

                                        'hh.grup_nama',
                                    )    

                                    ->leftjoin('dapok_tb_anak AS bb','bb.anak_kode','aa.anak_kode')           
                                    ->leftjoin('dapok_tb_ortu AS cc','cc.ortu_kode','bb.ortu_kode')              
                                    ->leftjoin('dapok_tb_penjemput AS dd','dd.pnj_kode','bb.pnj_kode')              
                                    ->leftjoin('tarif_tc_tarif AS ee','ee.tarif_kode','aa.tarif_kode')       
                                    ->leftjoin('tarif_ta_kategori AS gg','gg.kat_kode','aa.kat_kode')   
                                    ->leftjoin('sistem_tb_grup AS hh','hh.grup_kode','aa.grup_kode')  
                                    ->where('aa.kat_kode',$kategori)
                                    ->where('aa.grup_kode',$grup)
                                    ->orderby('aa.member_id','asc')
                                    ->get();
                            
                }
            }

         

            $data = $data->map(function($value) {

                $value->tgl_member  = format_indo($value->member_tgl);
                $get_date    = Carbon::now()->diff(date('Y-m-d', strtotime($value->member_tgl)));
                $hari_member = $get_date->days;

                    $years = ($hari_member / 365) ; // days / 365 days
                    $years = floor($years); // Remove all decimals
            
                    $month = ($hari_member % 365) / 30.5; // I choose 30.5 for Month (30,31) ;)
                    $month = floor($month); // Remove all decimals

                    $days = ($hari_member % 365) % 30.5; // the rest of days
        
                $value->lama_member = $years.' Tahun, '.$month.' Bulan, '.$days.' Hari';  

                $value->grup        = SistemGrupDetail::where('grup_kode',$value->grup_kode)->first()->detail_nama;
                $tgl_lahir          = Carbon::now()->diff($value->anak_tgl_lahir);
                $hari_anak = $tgl_lahir->days;

                    $years = ($hari_anak / 365) ; // days / 365 days
                    $years = floor($years); // Remove all decimals
            
                    $month = ($hari_anak % 365) / 30.5; // I choose 30.5 for Month (30,31) ;)
                    $month = floor($month); // Remove all decimals

                    $days = ($hari_anak % 365) % 30.5; // the rest of days
        
                $value->usia_anak = $years.' Tahun, '.$month.' Bulan, '.$days.' Hari';


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
        $result['pria'] = format_rupiah($data->where('anak_jekel','Laki - Laki')->where('anak_aktif','Y')->count('anak_id'));
        $result['perempuan'] = format_rupiah($data->where('anak_jekel','Perempuan')->where('anak_aktif','Y')->count('anak_id'));
        $result['total'] = format_rupiah($data->where('anak_aktif','Y')->count('anak_id'));


        return response()->json($result);

    }

    public function edit(Request $r)
    {
        $id = strtolower($r->get('id'));
        $data = Member::where('kat_id',$id)->first();
        return response()->json($data);
    }




}
