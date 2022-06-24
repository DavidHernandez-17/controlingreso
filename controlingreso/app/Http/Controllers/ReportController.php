<?php

namespace App\Http\Controllers;

use App\Exports\ReportsExport;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;


class ReportController extends Controller
{
    public function index()
    {
        return view('Reports.index', [
            'Reports' => Report::all()
        ]);
    }

    
    public function export()
    {
        return Excel::download(new ReportsExport, 'reportes.xlsx');
    }
}
