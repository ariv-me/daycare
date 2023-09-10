<?php

namespace App\Models;
use DB;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TarifPaket extends Model
{
    protected $connection = 'daycare';
    protected $table = 'tarif_tc_paket';
    protected $primaryKey = 'paket_id';


    public static function autonumber()

    {

        $data = DB::connection('daycare')
                     ->table('tarif_tc_paket')
                     ->select(DB::raw("MAX(RIGHT(paket_kode,4)) as kd_max"));
                   

        if($data->count() > 0)
        {
            foreach($data->get() as $k)
            {
                $tmp = ((int)$k->kd_max)+1;
                $kd = "PKT".sprintf("%04s", $tmp);
            }
        }
        
        else
        {
            $kd = "PKT"."0001";
        }

        return ($kd);

    }


}

