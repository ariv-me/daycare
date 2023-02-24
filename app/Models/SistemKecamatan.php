<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class SistemKecamatan extends Model
{
    protected $connection = 'spf';
    protected $table = 'sistem_ta_3_kecamatan';
    protected $primaryKey = 'kec_id';

    public static function getNamaKecamatan($param) {
        $nama = SistemKecamatan::where('kec_id',$param)->first();
        $data = $nama->kec_nama;

        return $data;  
    }

}
