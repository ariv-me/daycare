<?php

namespace App\Models;
use DB;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DapokKontakDarurat extends Model
{
    protected $connection = 'daycare';
    protected $table = 'dapok_tb_kontak';
    protected $primaryKey = 'kontak_id';

}

