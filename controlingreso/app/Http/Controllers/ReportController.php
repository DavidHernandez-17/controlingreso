<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        return view('Reports.index', [
            'Reports' => Report::all()
        ]);
    }
}
