<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DB;
use Carbon\Carbon;

class CateringOrderDetail extends Model
{
    protected $connection = 'daycare';
    protected $table = 'ctrg_order_detail';
    protected $primaryKey = 'detail_id';

}
