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
        $nama = SistemProvinsi::where('prov_id',$param)->first();
        $data = $nama->prov_nama;

        return $data;  
    }

}
