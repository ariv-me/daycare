<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
Use DB;
use Carbon\Carbon;

class SistemUsaha extends Model
{
    protected $connection = 'spf';
    protected $table = 'sistem_tc_usaha';
    protected $primaryKey = 'usaha_id';

    public static function getAll() {
        $data = SistemUsaha::orderby('usaha_urut')->get();
        return $data;  
    }

    public static function getNamaUsaha($param) {
        $usaha    = SistemUsaha::where('usaha_id',$param)->first();
        $data       = $usaha->usaha_nama;

       return $data;
    }
  
}
