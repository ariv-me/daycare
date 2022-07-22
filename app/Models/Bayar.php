<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bayar extends Model
{
    protected $connection = 'daycare';
    protected $table = 'tc_bayar';
    protected $primaryKey = 'bayar_kode';

    public static function bayar_kode()

    {

        $data = DB::connection('daycare')
                     ->table('tc_bayar')
                     ->select(DB::raw("MAX(RIGHT(bayar_kode,4)) as kd_max"));
                   
        
        $kode_depan = date('Ymd');    
        
        if($data->count() > 0)
        {
            foreach($data->get() as $k)
            {
                $tmp = ((int)$k->kd_max)+1;
                $kd = "BYR".$kode_depan.sprintf("%04s", $tmp);
            }
        }
        else
        {
            $kd = "BYR".$kode_depan."0001";
        }

        return ($kd);
    }


}
