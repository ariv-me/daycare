<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
Use DB;

class SistemUsers extends Model
{
    protected $connection = 'spf';
    protected $table = 'users';
    protected $primaryKey = 'id';

    public static function getIdu($param) {
        $data = DB::connection('spf')
                        ->table('users AS aa')
                        ->where('aa.idu',$param)
                        ->count();
        return $data;  
    }

}
