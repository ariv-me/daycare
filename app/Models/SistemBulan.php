<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
Use DB;
use Carbon\Carbon;

class SistemBulan extends Model
{
    protected $connection = 'spf';
    protected $table = 'sistem_ta_bulan';
    protected $primaryKey = 'bulan_id';
}
