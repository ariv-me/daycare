<?php

namespace App\Models;
use DB;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DapokAnak extends Model
{
    protected $connection = 'daycare';
    protected $table = 'dapok_tb_anak';
    protected $primaryKey = 'anak_id';

    public static function autonumber()

    {

        $data = DB::connection('daycare')
                     ->table('dapok_tb_anak')
                     ->select(DB::raw("MAX(RIGHT(anak_id,4)) as kd_max"));
                   
        
        $kode_depan = date('Y');    
        
        // dd($data);


        if($data->count() > 0)
        {
            foreach($data->get() as $k)
            {
                $tmp = ((int)$k->kd_max)+1;
                $kd = "NIS".$kode_depan.sprintf("%04s", $tmp);
            }
        }
        else
        {
            $kd = "NIS".$kode_depan."0001";
        }

        return ($kd);
    }


}

