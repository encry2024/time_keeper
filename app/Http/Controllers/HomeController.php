<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee\EmployeeLog;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ctr = 0;
        $employeeLogs = EmployeeLog::where('date_logged', '=', date('Y-m-d'))->simplePaginate(10);
        $employeeLogs->setPath('/dashboard');

        return view('home', compact('ctr', 'employeeLogs'));
    }
}
