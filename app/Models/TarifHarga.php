<?php

namespace App\Models;
use DB;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TarifHarga extends Model
{
    protected $connection = 'daycare';
    protected $table = 'tarif_tb_harga';
    protected $primaryKey = 'tarif_id';


    public static function autonumber()

    {

        $data = DB::connection('daycare')
                     ->table('tarif_tb_harga')
                     ->select(DB::raw("MAX(RIGHT(tarif_kode,4)) as kd_max"));
                   
        
        // $kode_depan = date('Ymd');    
        
        // dd($data);

        if($data->count() > 0)
        {
            foreach($data->get() as $k)
            {
                $tmp = ((int)$k->kd_max)+1;
                $kd = "TRF".sprintf("%04s", $tmp);
            }
        }
        
        else
        {
            $kd = "TRF"."0001";
        }

        return ($kd);

    }


}

