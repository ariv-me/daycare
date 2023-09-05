<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    protected $connection = 'daycare';
    protected $table = 'ta_periode';
    protected $primaryKey = 'periode_id';



}
