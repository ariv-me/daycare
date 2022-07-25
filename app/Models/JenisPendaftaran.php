<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisPendaftaran extends Model
{
    protected $connection = 'daycare';
    protected $table = 'tb_jenis';
    protected $primaryKey = 'jenis_id';

}
