<?php

namespace App\Http\Controllers;

use App\Imports\EmployeeImport;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class EmployeeController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:employees.delete')->only('confirmdelete', 'destroy');
        $this->middleware('can:employees.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {       
        $employee = Employee::all();

        return view('Employees.index', [
            'Employees' => $employee
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validData = $request->validate([
            'identification' => 'required|min:3|unique:employees,identification'.$request->id,
            'fullname' => 'required|min:2',
            'area' => 'required|min:2',
            'site' => 'required|min:2',
            'email' => 'required',
            'nickname' => 'required|min:2'
        ]);

        $date = Carbon::now('America/Bogota');

        $employee = new Employee();
        $employee->identification = $request->get('identification');
        $employee->fullname = $request->get('fullname');
        $employee->area = strtoupper($request->get('area'));  
        $employee->site = strtoupper($request->get('site'));
        $employee->email = $request->get('email');
        $employee->nickname = $request->get('nickname');
        $employee->created_at = $date;
        $employee->updated_at = $date;
        $employee->save();
        
        return redirect('/employees');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::findOrfail($id);

        return view('Employees.edit', [
            'Employee' => $employee
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validData = $request->validate([
            'identification' => 'required|min:3',
            'fullname' => 'required|min:2',
            'area' => 'required|min:2',
            'site' => 'required|min:2',
            'email' => 'required',
            'nickname' => 'required|min:2'            
        ]);

        $date = Carbon::now('America/Bogota');

        $employee = employee::findOrfail($id);
        $employee->identification = $request->get('identification');
        $employee->fullname = $request->get('fullname');
        $employee->area = strtoupper($request->get('area'));  
        $employee->site = strtoupper($request->get('site'));
        $employee->email = $request->get('email');
        $employee->nickname = $request->get('nickname');
        $employee->created_at = $date;
        $employee->updated_at = $date;

        $employee->save();
        return redirect('/employees');       

    }


    public function confirmdelete($id)
    {

        $Employee = Employee::findOrfail($id);

        return view('Employees.confirmdelete', [
            'Employee' => $Employee
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Employee = Employee::findOrfail($id);

        $Employee->delete();

        return redirect('/employees');

    }


    public function import_view()
    {
        return view('Employees.import-view');
    }

    public function import_excel(Request $request)
    {

        $file = $request->file('import_file');
        
        try
        {
            Excel::import(new EmployeeImport, $file);
            return redirect('/employees')->with('info', 'La importación se realizó correctamente.');
        } 
        catch ( \Throwable $th) 
        {
            $error = 'La importación no se realizó correctamente, sigue las recomendaciones ubicadas en la parte inferior.';
            return view('Employees.import-view', [
                'Error' => $error
            ]);
        }


    }


}
