<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DB;
use Carbon\Carbon;

class PendaftaranDetail extends Model
{
    protected $connection = 'daycare';
    protected $table = 'tc_daftar_detail';
    protected $primaryKey = 'detail_id';

    public static function daftar_kode()

    {

        $data = DB::connection('daycare')
                     ->table('tc_daftar_detail')
                     ->select(DB::raw("MAX(RIGHT(daftar_kode,4)) as kd_max"));
                   
        
        $kode_depan = date('Ymd');    
        
        // dd($data);


        if($data->count() > 0)
        {
            foreach($data->get() as $k)
            {
                $tmp = ((int)$k->kd_max)+1;
                $kd = "DFTR".$kode_depan.sprintf("%04s", $tmp);
            }
        }
        else
        {
            $kd = "DFTR".$kode_depan."0001";
        }

        return ($kd);
    }

}
