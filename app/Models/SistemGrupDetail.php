<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SistemGrupDetail extends Model
{
    protected $connection = 'daycare';
    protected $table = 'sistem_tb_grup_detail';
    protected $primaryKey = 'detail_id';

}
