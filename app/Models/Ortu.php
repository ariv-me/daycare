<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ortu extends Model
{
    protected $connection = 'daycare';
    protected $table = 'daftar_tb_ortu';
    protected $primaryKey = 'ortu_id';

    public static function ortu_kode()

    {

        $data = DB::connection('daycare')
                     ->table('daftar_tb_ortu')
                     ->select(DB::raw("MAX(RIGHT(ortu_id,4)) as kd_max"));
                   
        
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
