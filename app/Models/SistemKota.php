<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class SistemKota extends Model
{
    protected $connection = 'spf';
    protected $table = 'sistem_ta_2_kota';
    protected $primaryKey = 'kota_id';

    public static function getNamaKota($param) {
        $nama = SistemKota::where('kota_id',$param)->first();
        $data = $nama->kota_nama;

        return $data;  
    }

}
