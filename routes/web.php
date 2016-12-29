<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return redirect()->to('/login');
});

Auth::routes();

Route::group(['middleware' => ['web', 'auth']], function() {
    Route::get('/dashboard', 'HomeController@index')->name('dashboard');

    // LOGBOOK


    // USER - EMPLOYEE
    Route::get('/employees', 'Employee\EmployeeController@employeeIndex')->name('employee_index');
    Route::group(['prefix' => 'employee'], function() {
        Route::get('/create', 'Employee\EmployeeController@createEmployee')->name('create_employee');
        Route::post('/create', 'Employee\EmployeeController@postCreateEmployee')->name('post_create_employee');
        Route::get('/{employee}/profile', 'Employee\EmployeeController@employeeProfile')->name('employee_profile');
        Route::get('/{employee}/edit', 'Employee\EmployeeController@editEmployee')->name('edit_employee');
        Route::patch('/{employee}/update', 'Employee\EmployeeController@updateEmployee')->name('update_employee');

        
    });
});

Route::get('/logbook', 'Employee\EmployeeController@employeeLogbook');
Route::post('/log_employee', 'Employee\EmployeeController@logEmployee')->name('log_employee');
