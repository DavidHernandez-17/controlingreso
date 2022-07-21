<?php

namespace App\Http\Controllers;

use App\Imports\EmployeeImport;
use App\Models\AreaMaster;
use App\Models\Employee;
use App\Models\MDM;
use App\Models\SiteMaster;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\DB;

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
        return view('Employees.create', [
            'areas' => DB::table('area_masters')
                    ->orderBy('area', 'ASC')
                    ->get(),
            'sites' => DB::table('site_masters')
                    ->orderBy('site', 'ASC')
                    ->get()
        ]);
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
            'identification' => 'required|min:4|unique:employees,identification'.$request->id,
            'fullname' => 'required|min:6',
            'area' => 'required|min:3',
            'site' => 'required|min:2',
            'email' => 'required',
            'nickname' => 'required|min:3'
        ],[
            'identification.required' => 'La identificación es obligatoria.',
            'identification.unique' => 'La identificación ya existe, inténtelo de nuevo',
            'identification.min' => 'La identificación debe contener mínimo 4 dígitos.',
            'fullname.required' => 'El nombre es obligatorio.',
            'fullname.min' => 'El nombre debe contener mínimo 6 dígitos.',
            'area.required' => 'El área es obligatoria.',
            'area.min' => 'El área debe contener mínimo 3 dígitos.',
            'site.required' => 'La sede es obligatoria.',
            'site.min' => 'La sede debe contener mínimo 2 dígitos.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'nickname.required' => 'El apodo es obligatorio.',
            'nickname.min' => 'El apodo debe contener mínimo 3 dígitos.'
        ]);

        $date = Carbon::now('America/Bogota');

        $employee = new Employee();
        $employee->identification = $request->get('identification');
        $employee->fullname = $request->get('fullname');
        $employee->area = $request->get('area');  
        $employee->site = $request->get('site');
        $employee->email = $request->get('email');
        $employee->nickname = $request->get('nickname');
        $employee->created_at = $date;
        $employee->updated_at = $date;
        $employee->save();
        
        return redirect('/employees')->with('info', 'El colaborador fue creado correctamente');
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
            'Employee' => $employee,
            'areas' => DB::table('area_masters')
                    ->orderBy('area', 'ASC')
                    ->get(),
            'sites' => DB::table('site_masters')
                    ->orderBy('site', 'ASC')
                    ->get(),
            'EmployeeArea' => $employee->area,
            'EmployeeSite' => $employee->site
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
            'area' => 'required|min:3',
            'site' => 'required|min:2',
            'email' => 'required',
            'nickname' => 'required|min:3'            
        ],[
            'identification.required' => 'La identificación es obligatoria.',
            'identification.min' => 'La identificación debe contener mínimo 4 dígitos.',
            'fullname.required' => 'El nombre es obligatorio.',
            'fullname.min' => 'El nombre debe contener mínimo 6 dígitos.',
            'area.required' => 'El área es obligatoria.',
            'area.min' => 'El área debe contener mínimo 3 dígitos.',
            'site.required' => 'La sede es obligatoria.',
            'site.min' => 'La sede debe contener mínimo 2 dígitos.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'nickname.required' => 'El apodo es obligatorio.',
            'nickname.min' => 'El apodo debe contener mínimo 3 dígitos.'
        ]);

        $date = Carbon::now('America/Bogota');

        $employee = employee::findOrfail($id);
        $employee->identification = $request->get('identification');
        $employee->fullname = $request->get('fullname');
        $employee->area = $request->get('area');  
        $employee->site = $request->get('site');
        $employee->email = $request->get('email');
        $employee->nickname = $request->get('nickname');
        $employee->created_at = $date;
        $employee->updated_at = $date;

        $employee->save();
        return redirect('/employees')->with('info', 'El colaborador fue actualizado correctamente');       

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

        return redirect('/employees')->with('info', 'El colaborador fue eliminado correctamente');

    }


    public function import_view()
    {
        return view('Employees.import-view');
    }

    public function import_excel(Request $request)
    {

        $file = $request->file('import_file.xlsx');
        
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

    public function download_import_format()
    {
        $file= public_path()."\assets\downloads\importFormat.xlsx";
        return response()->download($file);
    }


}
