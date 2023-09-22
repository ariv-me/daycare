<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
Use DB;
use Carbon\Carbon;

class SistemPendidikan extends Model
{
    protected $connection = 'spf';
    protected $table = 'hcm_ta_pendidikan';
    protected $primaryKey = 'pdk_id';
}
