<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SistemGrup extends Model
{
    protected $connection = 'daycare';
    protected $table = 'sistem_tb_grup';
    protected $primaryKey = 'grup_id';

}
