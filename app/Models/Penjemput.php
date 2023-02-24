<?php

namespace App\Models;
use DB;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjemput extends Model
{
    protected $connection = 'daycare';
    protected $table = 'daftar_tb_penjemput';
    protected $primaryKey = 'pnj_id';

}

