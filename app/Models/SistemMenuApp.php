<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SistemMenuApp extends Model
{
    protected $connection = 'spf';
    protected $table = 'sistem_ta_menu_app';
    protected $primaryKey = 'menu_id';

}
