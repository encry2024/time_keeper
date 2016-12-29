<?php

namespace App\Employee;

use Illuminate\Database\Eloquent\Model;
use App\Employee\Employee;
use App\Employee\EmployeeLog;
use Hash;

class EmployeeLog extends Model
{
    //
    protected $table = 'employee_logs';

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public static function logEmployee($request)
    {
        $authenticate = Employee::whereEmployeeId($request->get('employee_id'))->first();

        if(count($authenticate) != 0) {
            if (Hash::check($request->get('password'), $authenticate->password)) {
                if($authenticate->log_status == 'LOGGED-OUT') {
                    $authenticate->log_status = 'LOGGED-IN';
                } elseif ($authenticate->log_status == 'LOGGED-IN') {
                    $authenticate->log_status = 'LOGGED-OUT';
                }
                $authenticate->save();

                $employeeLog = new EmployeeLog();
                $employeeLog->employee_id = $authenticate->id;
                $employeeLog->status = $authenticate->log_status;
                $employeeLog->date_logged = date('Y-m-d');
                
                if($employeeLog->save()) {
                    $alertMsg = $authenticate->employee_id . ' is now ' . $authenticate->log_status;
                    $alertIcon = 'fa fa-check';
                    $alertType = 'alert-success';

                    return redirect()->back()
                        ->with('alertMsg', $alertMsg)
                        ->with('alertIcon', $alertIcon)
                        ->with('alertType', $alertType);
                }

                    
            }
            $alertMsg = 'Incorrect Password';
            $alertIcon = 'fa fa-exlamation';
            $alertType = 'alert-danger';

            return redirect()->back()
                ->with('alertMsg', $alertMsg)
                ->with('alertIcon', $alertIcon)
                ->with('alertType', $alertType);

            return redirect()->back()->with('msg', 'User ' . $request->get('employee_id') . ' not found');
        } else {
            $alertMsg = 'Employee ID ' . $request->get('employee_id') . ' not found';
            $alertIcon = 'fa fa-exlamation';
            $alertType = 'alert-danger';

            return redirect()->back()
                ->with('alertMsg', $alertMsg)
                ->with('alertIcon', $alertIcon)
                ->with('alertType', $alertType);
        }
    }
}
