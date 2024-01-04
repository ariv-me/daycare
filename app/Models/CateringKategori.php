<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CateringKategori extends Model
{
    protected $connection = 'daycare';
    protected $table = 'ctrg_ta_kategori';
    protected $primaryKey = 'kat_id';

}
