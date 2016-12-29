<?php

namespace App\Employee;

use Illuminate\Database\Eloquent\Model;
use app\Http\Requests\CreateEmployeeRequest;

class Employee extends Model
{
    //
    public function employee_log()
    {
        return $this->hasMany(EmployeeLog::class);
    }

    public static function postCreateEmployee($createEmployeeRequest)
    {
        $employee = new Employee();
        $employee->name = ucwords($createEmployeeRequest->get('name'), ' ');
        $employee->employee_id = strtoupper($createEmployeeRequest->get('employee_id'));
        $employee->sss_number = $createEmployeeRequest->get('sss_number');
        $employee->philhealth_number = $createEmployeeRequest->get('philhealth_number');
        $employee->pagibig_number = $createEmployeeRequest->get('pagibig_number');
        $employee->tin_number = $createEmployeeRequest->get('tin_number');
        $employee->password = bcrypt($createEmployeeRequest->get('password'));
        $employee->log_status = "LOGGED-OUT";

        if($employee->save()) {
            $alertMsg = $employee->name . ' is now registered as Employee of MRAGE Corporation';
            $alertIcon = 'fa fa-check';
            $alertType = 'alert-success';

            return redirect()->back()
            ->with('alertMsg', $alertMsg)
            ->with('alertIcon', $alertIcon)
            ->with('alertType', $alertType);
        }
        return redirect()->back()->with('alertMsg', $alertMsg)
            ->with('alertIcon', $alertIcon)
            ->with('alertType', $alertType);
    }
}
