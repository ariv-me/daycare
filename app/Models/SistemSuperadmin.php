<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SistemSuperadmin extends Model
{
    protected $connection = 'mysql';
    protected $table = 'sistem_tb_superadmin';
    protected $primaryKey = 'akses_id';
}
