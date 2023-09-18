<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DB;
use Carbon\Carbon;

class Member extends Model
{
    protected $connection = 'daycare';
    protected $table = 'daftar_tc_member';
    protected $primaryKey = 'member_id';

    public static function autonumber()

    {

        $data = DB::connection('daycare')
                     ->table('daftar_tc_member')
                     ->select(DB::raw("MAX(RIGHT(member_kode,4)) as kd_max"));
                   
        
        $kode_depan = date('Y');    
        
        if($data->count() > 0)
        {
            foreach($data->get() as $k)
            {
                $tmp = ((int)$k->kd_max)+1;
                $kd = "MBR".$kode_depan.sprintf("%04s", $tmp);
            }
        }
        else
        {
            $kd = "MBR".$kode_depan."0001";
        }

        return ($kd);
    }

}
