<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SistemAgama extends Model
{
    protected $connection = 'spf';
    protected $table = 'hcm_ta_agama';
    protected $primaryKey = 'agama_id';

    public static function getNamaAgama($param) {

        $data = Agama::where('peru_id',$param)->first();
        return $data;  
    }

}
