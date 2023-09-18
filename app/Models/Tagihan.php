<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DB;
use Carbon\Carbon;

class Tagihan extends Model
{
    protected $connection = 'daycare';
    protected $table = 'daftar_tc_transaksi';
    protected $primaryKey = 'trs_id';

    public static function autonumber()

    {

        $data = DB::connection('daycare')
                     ->table('daftar_tc_transaksi')
                     ->select(DB::raw("MAX(RIGHT(trs_kode,4)) as kd_max"));
                   
        
        $kode_depan = date('Y');    
        
        if($data->count() > 0)
        {
            foreach($data->get() as $k)
            {
                $tmp = ((int)$k->kd_max)+1;
                $kd = "TAG".$kode_depan.sprintf("%04s", $tmp);
            }
        }
        else
        {
            $kd = "TAG".$kode_depan."0001";
        }

        return ($kd);
    }

}
