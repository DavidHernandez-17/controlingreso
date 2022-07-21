<?php

namespace App\Imports;

use App\Models\Employee;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EmployeeImport implements ToModel, WithHeadingRow, WithBatchInserts 
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $date = Carbon::now('America/Bogota');

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

    public function batchSize() : int
    {
        return 4000;
    }

    public function chuckSize() : int
    {
        return 4000;
    }

}
