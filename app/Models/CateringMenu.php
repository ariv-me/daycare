<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class CateringMenu extends Model
{
    protected $connection = 'daycare';
    protected $table = 'ctrg_tb_menu';
    protected $primaryKey = 'menu_id';

    public static function periksa_kode($kode){
        $data = CateringMenu::where('menu_kode',$kode)->count();
        return $data;
    }


}
