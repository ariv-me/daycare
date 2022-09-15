<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grup extends Model
{
    protected $connection = 'daycare';
    protected $table = 'sistem_tb_grup';
    protected $primaryKey = 'grup_id';

}
