<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DB;
use Carbon\Carbon;

class PendaftaranDetail extends Model
{
    protected $connection = 'daycare';
    protected $table = 'daftar_tc_transaksi_detail';
    protected $primaryKey = 'detail_id';

    public static function autokode()

    {

        $data = DB::connection('daycare')
                     ->table('daftar_tc_transaksi_detail')
                     ->select(DB::raw("MAX(RIGHT(detail_kode,4)) as kd_max"));

        if($data->count() > 0)
        {
            foreach($data->get() as $k)
            {
                $tmp = ((int)$k->kd_max)+1;
                $kd = "DTL".sprintf("%04s", $tmp);
            }
        }
        
        else
        {
            $kd = "DTL"."0001";
        }

        return ($kd);

    }

}
