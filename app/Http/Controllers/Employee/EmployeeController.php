<?php

namespace App\Http\Controllers\Employee;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateEmployeeRequest;
use App\Employee\Employee;
use App\Employee\EmployeeLog;

class EmployeeController extends Controller
{
    //
    public function employeeIndex()
    {
        $ctr = 0;
        $employees = Employee::simplePaginate(30);
        $employees->setPath('/employees');

        return view('employee.index', compact('employees', 'ctr'));
    }

    public function createEmployee()
    {
        return view('employee.create');
    }

    public function postCreateEmployee(CreateEmployeeRequest $createEmployeeRequest)
    {
        $adminCreateEmployee = Employee::postCreateEmployee($createEmployeeRequest);

        return $adminCreateEmployee;
    }

    public function employeeLogbook()
    {
        return view('employee.logbook');
    }

    public function logEmployee(Request $request)
    {
        $logEmployee = EmployeeLog::logEmployee($request);

        return $logEmployee;
    }
}
