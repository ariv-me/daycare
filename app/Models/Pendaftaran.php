<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    protected $connection = 'daycare';
    protected $table = 'tc_pendaftaran';
    protected $primaryKey = 'daftar_id';
}
