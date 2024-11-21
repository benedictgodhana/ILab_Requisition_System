<?php

namespace App\Exports;

use App\Models\Requisition;
use Maatwebsite\Excel\Concerns\FromCollection;

class RequisitionsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Requisition::all();
    }
}
