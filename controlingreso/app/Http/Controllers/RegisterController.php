<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmailNotification;
use App\Mail\ControlIngresoAA;
use App\Models\Employee;
use App\Models\Report;
use Carbon\Carbon;
use DateTime;
use Exception;
use Faker\Provider\cs_CZ\DateTime as Cs_CZDateTime;
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

        $employees = Employee::Where('identification', $identification)->get();

        //Define zona horaria
        $tz = date_default_timezone_set("America/Bogota");
        //Hora y fecha actual
        $date = getDate();
        //Conversión fecha y hora actual
        $entry = date('Y-m-j H:i:s');

        $ConvertCurrent = date('Y-m-j');

        //Buscar reportes relacionado con empleado

        $searches = Report::where('identification', $identification)->orderBy('id', 'asc')->get();

        //Si no existe reporte relacionado
        if ((sizeof($searches)) == 0) {
            foreach ($employees as $Register) {
                DB::table('reports')
                    ->insert([
                        'identification' => $Register->identification,
                        'fullname' => $Register->fullname,
                        'area' => $Register->area,
                        'site' => $Register->site,
                        'email' => $Register->email,
                        'nickname' => $Register->nickname,
                        'created_at' => $entry
                    ]);
            }

            return redirect('/register');
        }
        //Si existe algún reporte = update
        else {
            foreach ($searches as $search) {
                $created = $search->created_at;
            }

            $fecha = date_format($created, 'Y-m-j');

            if ($fecha == $ConvertCurrent) 
            {

                $exit = date('Y-m-j H:i:s');

                $searches2 = Report::where('identification', $identification)->get();
                foreach ($searches2 as $search2) {
                    $id = $search2->id;
                }

                //Registro Salida
                $UpdateReport = Report::find($id);
                $UpdateReport->updated_at = $exit;

                //Método para stay
                $entryDiff = new DateTime($created);
                $exitDiff = new DateTime($exit);
                $interval = $entryDiff->diff($exitDiff);
                $diff = $interval->format('%h:%i:%s');;
                $UpdateReport->stay = $diff;

                $UpdateReport->save();

                try
                {
                    $email = $UpdateReport->email;
                    $report = Report::where($request->identification)->orderBy('id', 'desc')->first();

                    //Enviar correo de forma sincronica
                    // Mail::to($email)->send(new ControlIngresoAA($report));
                    
                    //Enviar correo de forma asincrona
                    SendEmailNotification::dispatch($report);

                    return redirect('/register');

                }
                catch (\Throwable $th)
                {
                    return redirect('/register');
                }

                return redirect('/register');
            } 
            else 
            {
                foreach ($employees as $Register) {
                    DB::table('reports')
                        ->insert([
                            'identification' => $Register->identification,
                            'fullname' => $Register->fullname,
                            'area' => $Register->area,
                            'site' => $Register->site,
                            'email' => $Register->email,
                            'nickname' => $Register->nickname,
                            'created_at' => $entry
                        ]);
                }

                return redirect('/register');
            }
        }
    }
}
