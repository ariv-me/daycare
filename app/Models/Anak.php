<?php

namespace App\Models;
use DB;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anak extends Model
{
    protected $connection = 'daycare';
    protected $table = 'daftar_tb_anak';
    protected $primaryKey = 'anak_id';

    public static function autonumber()

    {

        $data = DB::connection('daycare')
                     ->table('daftar_tb_anak')
                     ->select(DB::raw("MAX(RIGHT(anak_id,4)) as kd_max"));
                   
        
        $kode_depan = date('Ymd');    
        
        // dd($data);


        if($data->count() > 0)
        {
            foreach($data->get() as $k)
            {
                $tmp = ((int)$k->kd_max)+1;
                $kd = $kode_depan.sprintf("%04s", $tmp);
            }
        }
        else
        {
            $kd = $kode_depan."0001";
        }

        return ($kd);
    }


}

