<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $connection = 'daycare';
    protected $table = 'tb_kelas';
    protected $primaryKey = 'kelas_id';



}
