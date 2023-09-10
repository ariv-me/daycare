<?php

namespace App\Models;
use DB;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TarifPaketDetail extends Model
{
    protected $connection = 'daycare';
    protected $table = 'tarif_tc_paket_detail';
    protected $primaryKey = 'detail_id';

}

