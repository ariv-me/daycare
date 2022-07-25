<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    protected $connection = 'daycare';
    protected $table = 'tb_perusahaan';
    protected $primaryKey = 'grup_id';



}
