<?php

namespace App\Http\Controllers;

use App\Mail\AccessNotification;
use App\Models\Employee;
use App\Models\Report;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

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
                'email' => $Register->email,
                'nickname' => $Register->nickname,
                'created_at' => $date
            ]);
        }
        
        try 
        {
            $email = $Register->email;
            $report = Report::where($request->identification)->orderBy('id', 'desc')->first();
    
            Mail::to($email)->send(new AccessNotification($report));

            return redirect('/register');

        } 
        catch (\Throwable $th) 
        {
            return redirect('/register');

        }


    }

}
