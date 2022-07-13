<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Report;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{

    public function __construct()
    {   
        $this->middleware('can:register.index');
    }

    public function index()
    {
        return view('Register.index');
    }

    public function register(Request $request)
    {
        $identification = $request->get('register');
        
        $Register = Employee::Where('identification', $identification)->get();

        $date = Carbon::now('America/Bogota');

        foreach ($Register as $Register) {
            DB::table('reports')
            ->insert([
                'identification' => $Register->identification,
                'fullname' => $Register->fullname,
                'area' => $Register->area,
                'site' => $Register->site,
                'created_at' => $date
            ]);
        }

        return redirect('/register');

    }

}
