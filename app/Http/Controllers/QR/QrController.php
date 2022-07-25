<?php

namespace App\Http\Controllers\QR;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Employees = Employee::all();
    
        $FolderQR = storage_path("app/public/img/qrcode/");
        if (!file_exists($FolderQR)) {
            mkdir($FolderQR, 0777, true);
        }else {
            //se deben borral los archivos para volverlos a cargar ... de esta forma ignoramos duplicados
            $gestor = opendir(storage_path("app/public/img/qrcode/"));
            while (($archivo = readdir($gestor)) !== false)  {
                // Solo buscamos archivos sin entrar en subdirectorios
                if (is_file(storage_path("app/public/img/qrcode/")."/".$archivo)) {
                    unlink(storage_path("app/public/img/qrcode/")."/".$archivo);
                }            
            }
        }

        foreach ($Employees as $key => $item) {
            QrCode::size(500)
            ->format('png')
            ->color(8, 21, 40)
            //->backgroundColor(226, 111, 12)
            ->generate($item["identification"], storage_path("app/public/img/qrcode/".$item['identification'].".png"));
        }
        
        // return Inertia("qrgenerator/index", [
        //     "employees" => $employees,
        //     "path" => public_path("/storage/img/qrcode/")
        // ]);
        

        return view("Employees.generador_qr", [
            'Employees' => $Employees
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
