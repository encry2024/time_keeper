@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-3 btn-group-vertical">
                <a href="{{ route('create_employee') }}" class="btn btn-success" style="text-align: left;">Add Employee</a>
                <a href="{{ route('dashboard') }}" class="btn btn-default" style="text-align: left;">Back to Dashboard</a>
            </div>

            <div class="col-lg-9">

                <div class="panel panel-default">
                    <div class="panel-heading"><strong>List of Employees</strong></div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                            @if($employees->count() != 0)
                                <div class="pull-right">
                                    {{ $employees->render() }}
                                </div>
                                <table class="table table-striped">
                                    <thead>
                                        <th>#</th>
                                        <th>Employee ID</th>
                                        <th>Employee Name</th>
                                        <th>Log Status</th>
                                        <th class="text-right">Action</th>
                                    </thead>

                                    <tbody>
                                    @foreach($employees as $employee)
                                        <tr>
                                            <td>{{ ((($employees->currentPage() - 1) * $employees->perPage()) + ($ctr++) + 1) }}</td>
                                            <td>{{ $employee->employee_id }}</td>
                                            <td>{{ $employee->name }}</td>
                                            <td>{{ $employee->log_status }}</td>
                                            <td>
                                                <a href="" class="btn btn-success pull-right"><i class="fa fa-user"></i> Profile</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @else
                                <div class="alert alert-danger" role="alert">
                                    <strong>You have 0 records of Employees</strong>
                                </div>
                            @endif
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@stop