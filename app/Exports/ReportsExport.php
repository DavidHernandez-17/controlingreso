<?php

namespace App\Exports;

use App\Models\Report;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;

class ReportsExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $areaUser = Auth::user()->area;
        return Report::where('area', $areaUser)->get();
    }
}
