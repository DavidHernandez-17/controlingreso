<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Employees.index', [
            'Employees' => Employee::all()
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
            'site' => 'required|min:2'
        ]);

        $employee = new Employee();
        $employee->identification = $request->get('identification');
        $employee->fullname = $request->get('fullname');
        $employee->area = strtoupper($request->get('area'));  
        $employee->site = strtoupper($request->get('site'));

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
            'site' => 'required|min:2'
        ]);

        $Employee = Employee::findOrfail($id);
        $Employee->identification = $request->get('identification');
        $Employee->fullname = $request->get('fullname');
        $Employee->area = strtoupper($request->get('area'));  
        $Employee->site = strtoupper($request->get('site'));

        $Employee->save();
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
}
