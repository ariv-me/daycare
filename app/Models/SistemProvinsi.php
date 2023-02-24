<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class SistemProvinsi extends Model
{
    protected $connection = 'spf';
    protected $table = 'sistem_ta_1_provinsi';
    protected $primaryKey = 'prov_id';

    public static function getNamaProvinsi($param) {
        $nama = SistemProvinsi::where('pro_id',$param)->first();
        $data = $nama->pro_nama;

        return $data;  
    }

}
