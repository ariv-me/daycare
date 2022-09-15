<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    protected $connection = 'daycare';
    protected $table = 'sistem_tb_perusahaan';
    protected $primaryKey = 'peru_id';

    public static function getNamaPerusahaan() {

        $data = Perusahaan::where('peru_id','1')->first();

        dd($data);

        return $data;  
    }

}
