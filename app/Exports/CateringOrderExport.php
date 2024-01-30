<?php

namespace App\Exports;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class CateringOrderExport implements FromView
{
    
    protected $status;
    protected $filter_tanggal_awal;
    protected $filter_tanggal_akhir;

    function __construct($filter_tanggal_awal,$filter_tanggal_akhir,$status) {
        $this->status  = $status;
        $this->filter_tanggal_awal = $filter_tanggal_awal;
        $this->filter_tanggal_akhir = $filter_tanggal_akhir;
    }

    public function view(): View
    {   
       
        $status  = $this->status;
        $tanggal_mulai  = $this->filter_tanggal_awal;
        $tanggal_akhir  = $this->filter_tanggal_akhir;

        $data = ['yayuk,yiyiyk'];

        $data = DB::connection('daycare')
                                ->table('ctrg_tc_order_detail AS aa')      
                                ->select(
                                  
                                    'bb.anak_kode',
                                    'bb.anak_id',
                                    'bb.anak_aktif',
                                    'bb.anak_nama',
                                    'bb.anak_jekel',
                                    'bb.anak_tgl_lahir',

                                    'aa.menu_kode',
                                    'aa.order_kode AS order_kode',
                                    'aa.menu_kode',
                                    'aa.detail_jam',
                                    'aa.detail_tgl',
                                    'aa.detail_qty',
                                    'aa.detail_harga',
                                    'aa.detail_total',
                                    'aa.detail_status',
                                    'aa.detail_id',

                                    'dd.menu_kode',
                                    'dd.menu_nama',
                                    
                                    'ee.kat_id',
                                    'ee.kat_nama',

                                    'ff.order_kode',
                                    'ff.order_status',

                                )    
                                ->leftjoin('dapok_tb_anak AS bb','bb.anak_kode','aa.anak_kode')  
                                ->leftjoin('ctrg_tb_menu AS dd','dd.menu_kode','aa.menu_kode')  
                                ->leftjoin('ctrg_ta_kategori AS ee','ee.kat_id','dd.kat_id')  
                                ->leftjoin('ctrg_tc_order AS ff','ff.order_kode','aa.order_kode')  
                                ->where('aa.detail_aktif','Y')     
                                ->where('aa.detail_status',$status)     
                                ->where('ff.order_status','U')     
                                ->where('aa.detail_tgl', '>=', $tanggal_mulai)
                                ->where('aa.detail_tgl', '<=', $tanggal_akhir)
                                ->orderby('aa.detail_id','desc')
                                ->orderby('ff.order_status','desc')
                                ->get();

            $data = $data->map(function($value){

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

                $value->detail_harga = format_rupiah($value->detail_harga);
                $value->detail_total = format_rupiah($value->detail_total);

                return $value;

            });


        return view('catering.orderan.export_order', [
            'data' => $data
        ]);
    }
}