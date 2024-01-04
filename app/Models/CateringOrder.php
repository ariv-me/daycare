<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DB;
use Carbon\Carbon;

class CateringOrder extends Model
{
    protected $connection = 'daycare';
    protected $table = 'ctrg_tc_order';
    protected $primaryKey = 'order_id';

    public static function order_kode()

    {

        $data = DB::connection('daycare')
                        ->table('ctrg_tc_order')
                        ->select(DB::raw("MAX(RIGHT(order_kode,4)) as kd_max"));
                   
        if($data->count() > 0)
        {
            foreach($data->get() as $k)
            {
                $tmp = ((int)$k->kd_max)+1;
                $kd = "ORDR".sprintf("%04s", $tmp);
            }
        }
        
        else
        {
            $kd = "ORDR"."0001";
        }

        return ($kd);
    }

}
