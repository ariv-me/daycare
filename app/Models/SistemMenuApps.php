<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SistemMenuApps extends Model
{
    protected $connection = 'mysql';
    protected $table = 'sistem_ta_menu_apps';
    protected $primaryKey = 'menu_id';

}
