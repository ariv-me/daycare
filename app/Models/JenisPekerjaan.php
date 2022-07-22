<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisPekerjaan extends Model
{
    protected $connection = 'daycare';
    protected $table = 'tb_jenis_pekerjaan';
    protected $primaryKey = 'kerja_id';

}
