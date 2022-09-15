<?php

namespace App\Models;
use DB;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarif extends Model
{
    protected $connection = 'daycare';
    protected $table = 'tarif_tb_harga';
    protected $primaryKey = 'tarif_kode';

}

