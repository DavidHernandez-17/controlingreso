<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Report;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function index()
    {
        return view('Register.index');
    }

    public function register(Request $request)
    {
        $identification = $request->get('register');
        $Employee = Employee::Where('identification', $identification)->get();

        $date = Carbon::now();

        foreach ($Employee as $Employee) {
            DB::table('reports')
            ->insert([
                'identification' => $Employee->identification,
                'fullname' => $Employee->fullname,
                'area' => $Employee->area,
                'site' => $Employee->site,
                'created_at' => $date
            ]);
        }

        return redirect('/register');

    }

}
