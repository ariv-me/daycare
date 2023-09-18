<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SistemSuperadmin extends Model
{
    protected $connection = 'spf';
    protected $table = 'hcm_tz_superadmin';
    protected $primaryKey = 'akses_id';
}
