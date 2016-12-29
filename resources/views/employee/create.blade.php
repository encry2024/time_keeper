@extends('layouts.app')

@section('content')
    <div class="container">
        @if (count($errors) > 0)
            <div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong><i class="fa fa-exclamation"></i> Error summary:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(Session::has('alertMsg'))
            <div class="alert {{ Session::get('alertType') }} alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong><i class="{{ Session::get('alertIcon') }}"></i> {{ Session::get('alertMsg') }}</strong>
            </div>
        @endif
        <div class="row">
            <div class="col-lg-3 btn-group-vertical">
                <a href="#register_employee" class="btn btn-success" style="text-align: left;" onclick="document.getElementById('FormPostCreateEmployee').submit();">Register Employee</a>
                <a href="{{ route('employee_index') }}" class="btn btn-default" style="text-align: left;">Back to Employee Index</a>
            </div>

            <div class="col-lg-9">
                
                <div class="panel panel-success">
                    <div class="panel-heading"><strong>Register Employee</strong></div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                
                                <form action="{{ route('post_create_employee') }}" class="form form-horizontal" method="POST" id="FormPostCreateEmployee">
                                    {{ csrf_field() }}

                                    <div class="form-group{{ $errors->has('employee_id') ? ' has-error' : '' }}">
                                        <label for="employeeId" class="control-label col-lg-3">Employee ID:</label>
                                        <div class="col-lg-5">
                                            <input id="employeeId" type="text" class="form-control" name="employee_id" required placeholder="Employee ID"
                                            value="{{ old('name') }}">
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label for="employeeName" class="control-label col-lg-3">Employee Name:</label>
                                        <div class="col-lg-5">
                                            <input id="employeeName" type="text" class="form-control" name="name" required placeholder="Employee Name"
                                            value="{{ old('name') }}">
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label for="email" class="control-label col-lg-3">E-mail:</label>
                                        <div class="col-lg-5">
                                            <input id="email" type="email" class="form-control" name="email" required placeholder="E-Mail Address should be unique">
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <label for="password" class="control-label col-lg-3">Password:</label>
                                        <div class="col-lg-5">
                                            <input id="password" type="password" class="form-control" name="password" required placeholder="Password">
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                        <label for="passwordConfirmation" class="control-label col-lg-3">Password Confirmation:</label>
                                        <div class="col-lg-5">
                                            <input id="passwordConfirmation" type="password" class="form-control" name="password_confirmation" required placeholder="Confirm Password">
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('sss_number') ? ' has-error' : '' }}">
                                        <label for="sssNumber" class="control-label col-lg-3">SSS Number:</label>
                                        <div class="col-lg-5">
                                            <input id="sssNumber" type="text" class="form-control" name="sss_number" required placeholder="##-#######-#">
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('philhealth_number') ? ' has-error' : '' }}">
                                        <label for="philHealthNumber" class="control-label col-lg-3">Phil Health Number:</label>
                                        <div class="col-lg-5">
                                            <input id="philHealthNumber" type="text" class="form-control" name="philhealth_number" required placeholder="##-#########-# ">
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('pagibig_number') ? ' has-error' : '' }}">
                                        <label for="pagIbigNumber" class="control-label col-lg-3">Pag-Ibig Number:</label>
                                        <div class="col-lg-5">
                                            <input id="pagIbigNumber" type="text" class="form-control" name="pagibig_number" required placeholder="####-####-####">
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('tin_number') ? ' has-error' : '' }}">
                                        <label for="tinNumber" class="control-label col-lg-3">TIN Number:</label>
                                        <div class="col-lg-5">
                                            <input id="tinNumber" type="text" class="form-control" name="tin_number" required placeholder="###-###-###-####">
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@stop