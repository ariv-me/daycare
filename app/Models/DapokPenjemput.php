<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DapokPenjemput extends Model
{
    protected $connection = 'daycare';
    protected $table = 'dapok_tb_penjemput';
    protected $primaryKey = 'pnj_id';

}
