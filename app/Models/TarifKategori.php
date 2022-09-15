<?php

namespace App\Models;
use DB;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TarifKategori extends Model
{
    protected $connection = 'daycare';
    protected $table = 'tarif_ta_kategori';
    protected $primaryKey = 'kat_id';

}

