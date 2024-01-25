<?php

namespace App\Exports;

use App\Models\CateringOrderDetail;
use Maatwebsite\Excel\Concerns\FromCollection;

class CateringOrderBayarExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return CateringOrderDetail::all();
    }
}
