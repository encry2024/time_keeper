@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-3 btn-group-vertical" role="group">
            <a href="{{ route('employee_index') }}" class="btn btn-default" style="text-align: left;">Manage Employees</a>
            <a type="button" class="btn btn-default" style="text-align: left;">Time-in & Time-out Logs</a>
        </div>
        
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Dashboard</strong></div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <h2>Today's Log</h2>
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="col-lg-12">
                            @if($employeeLogs->count() != 0)
                                <div class="pull-right">
                                    {{ $employeeLogs->render() }}
                                </div>
                                <table class="table table-striped">
                                    <thead>
                                        <th>#</th>
                                        <th>Employee ID</th>
                                        <th>Employee Name</th>
                                        <th>Log Status</th>
                                        <th>Time Logged</th>
                                        <th>Date Logged</th>
                                        <th class="text-right">Action</th>
                                    </thead>

                                    <tbody>
                                    @foreach($employeeLogs as $employeeLog)
                                        <tr>
                                            <td>{{ ((($employeeLogs->currentPage() - 1) * $employeeLogs->perPage()) + ($ctr++) + 1) }}</td>
                                            <td>{{ $employeeLog->employee->employee_id }}</td>
                                            <td>{{ $employeeLog->employee->name }}</td>
                                            <td>{{ $employeeLog->status }}</td>
                                            <td>{{ date('H:i A', strtotime($employeeLog->created_at)) }}</td>
                                            <td>{{ date('F d, Y', strtotime($employeeLog->created_at)) }}</td>
                                            <td>
                                                <a href="" class="btn btn-success pull-right"><i class="fa fa-user"></i> Profile</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @else
                                <div class="alert alert-danger" role="alert">
                                    <strong>You have 0 records of Employees Logs</strong>
                                </div>
                            @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
