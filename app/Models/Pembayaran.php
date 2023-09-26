<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DB;
use Carbon\Carbon;

class Pembayaran extends Model
{
    protected $connection = 'daycare';
    protected $table = 'bayar_tc';
    protected $primaryKey = 'bayar_id';

    public static function autonumber()

    {

        $data = DB::connection('daycare')
                     ->table('bayar_tc')
                     ->select(DB::raw("MAX(RIGHT(bayar_kode,4)) as kd_max"));   
        
        if($data->count() > 0)
        {
            foreach($data->get() as $k)
            {
                $tmp = ((int)$k->kd_max)+1;
                $kd = "BYR".sprintf("%04s", $tmp);
            }
        }
        else
        {
            $kd = "BYR"."0001";
        }

        return ($kd);
    }

}
