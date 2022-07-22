<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
Use DB;
use Carbon\Carbon;

class SistemHubungan extends Model
{
    protected $connection = 'mysql';
    protected $table = 'sistem_ta_hubungan';
    protected $primaryKey = 'hub_id';
}
