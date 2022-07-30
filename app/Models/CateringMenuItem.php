<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use Carbon\Carbon;

class CateringMenuItem extends Model
{
    protected $connection = 'daycare';
    protected $table = 'ctrg_menu_item';
    protected $primaryKey = 'item_id';

}
