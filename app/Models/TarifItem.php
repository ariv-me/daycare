<?php

namespace App\Models;
use DB;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TarifItem extends Model
{
    protected $connection = 'daycare';
    protected $table = 'tarif_tb_item';
    protected $primaryKey = 'item_id';

    public static function autonumber()

    {

        $data = DB::connection('daycare')
                     ->table('tarif_tb_item')
                     ->select(DB::raw("MAX(RIGHT(item_kode,4)) as kd_max"));
                   

        if($data->count() > 0)
        {
            foreach($data->get() as $k)
            {
                $tmp = ((int)$k->kd_max)+1;
                $kd = "ITM".sprintf("%04s", $tmp);
            }
        }
        
        else
        {
            $kd = "ITM"."0001";
        }

        return ($kd);

    }

}

