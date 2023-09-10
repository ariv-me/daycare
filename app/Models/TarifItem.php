<?php

namespace App\Models;
use DB;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TarifItem extends Model
{
    protected $connection = 'daycare';
    protected $table = 'tarif_tb_item';
    protected $primaryKey = 'item_id';

}

