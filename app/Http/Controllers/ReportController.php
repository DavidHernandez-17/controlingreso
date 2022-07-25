<?php

namespace App\Http\Controllers;

use App\Exports\ReportsExport;
use App\Exports\ReportsExportAll;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;


class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:reports.index');
        $this->middleware('can:reports.indexAll')->only('indexAll');
    }

    public function index()
    {
        try 
        {
            $areaUser = Auth::user()->area;
            $Report = Report::where('area', $areaUser)->get();

            return view('Reports.index', [
                'Reports' => $Report
            ]);
        } 
        catch (\Throwable $th) 
        {
            $error = 'Si no puedes visualizar lo reportes comunicate con el administrador.';
            return view('Reports.index', [
                'Message' => $error
            ]);
        }
    }

    public function indexAll()
    {
        try 
        {
            $Report = Report::all();
            
            return view('Reports.index', [
                'Reports' => $Report
            ]);
        } 
        catch (\Throwable $th) 
        {
            $error = 'Si no puedes visualizar lo reportes comunicate con el administrador.';
            return view('Reports.index', [
                'Message' => $error
            ]);
        }
    }


    public function export()
    {
        return Excel::download(new ReportsExport, 'Reportes.xlsx');
    }

    public function exportAll()
    {
        return Excel::download(new ReportsExportAll, 'ReporteCompleto.xlsx');
    }

}
