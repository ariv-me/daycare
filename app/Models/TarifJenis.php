<?php

namespace App\Models;
use DB;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TarifJenis extends Model
{
    protected $connection = 'daycare';
    protected $table = 'tarif_ta_jenis';
    protected $primaryKey = 'jenis_id';

}

