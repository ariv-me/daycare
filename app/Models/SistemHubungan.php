<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
Use DB;
use Carbon\Carbon;

class SistemHubungan extends Model
{
    protected $connection = 'spf';
    protected $table = 'hcm_ta_hubungan';
    protected $primaryKey = 'hub_id';
}
