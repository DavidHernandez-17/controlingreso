<?php

namespace App\Imports;

use App\Models\Employee;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;

class EmployeesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $date = Carbon::now();
        
        return new Employee([       
                'identification' => $row['identificacion'],
                'fullname' => $row['nombre'],
                'area' => $row['area'],
                'site' => $row['sede'],
                'email' => $row['correo_electronico'],
                'nickname' => $row['apodo'],
                'created_at' => $date,
                'updated_at' => $date
        ]);
    }
}
