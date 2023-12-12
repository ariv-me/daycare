<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class DapokOrtu extends Model
{
    protected $connection = 'daycare';
    protected $table = 'dapok_tb_ortu';
    protected $primaryKey = 'ortu_id';

    public static function autonumber()

    {

        $data = DB::connection('daycare')
                     ->table('dapok_tb_ortu')
                     ->select(DB::raw("MAX(RIGHT(ortu_kode,4)) as kd_max"));

        $kode_depan = date('Y');    
        
        // dd($data);


        if($data->count() > 0)
        {
            foreach($data->get() as $k)
            {
                $tmp = ((int)$k->kd_max)+1;
                $kd = "ORTU".$kode_depan.sprintf("%04s", $tmp);
            }
        }
        else
        {
            $kd = "ORTU".$kode_depan."0001";
        }

        return ($kd);
    }

}
