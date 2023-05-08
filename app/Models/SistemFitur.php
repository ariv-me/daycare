<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SistemFitur extends Model
{
    protected $connection = 'spf';
    protected $table = 'sistem_ta_fitur';
    protected $primaryKey = 'fitur_id';

}
