<?php

namespace App\Models;
use DB;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KontakDarurat extends Model
{
    protected $connection = 'daycare';
    protected $table = 'daftar_tb_korat';
    protected $primaryKey = 'korat_id';

}

