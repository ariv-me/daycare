<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SistemAgama extends Model
{
    protected $connection = 'daycare';
    protected $table = 'ta_agama';
    protected $primaryKey = 'agama_id';

}
