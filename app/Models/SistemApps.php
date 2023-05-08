<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SistemApps extends Model
{
    protected $connection = 'spf';
    protected $table = 'sistem_ta_apps';
    protected $primaryKey = 'apps_id';

}
