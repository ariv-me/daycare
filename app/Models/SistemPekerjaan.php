<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SistemPekerjaan extends Model
{
    protected $connection = 'spf';
    protected $table = 'simklinik_ta_pekerjaan';
    protected $primaryKey = 'pekerjaan_id';

}
