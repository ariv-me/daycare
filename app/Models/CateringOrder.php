<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DB;
use Carbon\Carbon;

class CateringOrder extends Model
{
    protected $connection = 'daycare';
    protected $table = 'ctrg_order';
    protected $primaryKey = 'order_kode';

    public static function order_kode()

    {

        $data = DB::connection('daycare')
                        ->table('ctrg_order_detail')
                        ->select(DB::raw("MAX(RIGHT(order_kode,4)) as kd_max"));
                   
        $kode_depan = date('Ymd');    
        
        if($data->count() > 0)
        {
            foreach($data->get() as $k)
            {
                $tmp = ((int)$k->kd_max)+1;
                $kd = "ORDR".$kode_depan.sprintf("%04s", $tmp);
            }
        }
        
        else
        {
            $kd = "ORDR".$kode_depan."0001";
        }

        return ($kd);
    }

}
