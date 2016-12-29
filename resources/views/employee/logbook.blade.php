@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-push-2">
                @if(Session::has('alertMsg'))
                    <div class="alert {{ Session::get('alertType') }} alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong><i class="{{ Session::get('alertIcon') }}"></i> {{ Session::get('alertMsg') }}</strong>
                    </div>
                @endif
                <form action="{{ route('log_employee') }}" class="form-horizontal" method="POST">
                    {{ csrf_field() }}
                    
                    <div class="panel panel-default">
                        <div class="panel-heading">Logbook</div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="" class="control-label col-lg-3">Employee ID:</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" name="employee_id">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="control-label col-lg-3">Password:</label>
                                <div class="col-lg-8">
                                    <input type="password" class="form-control" name="password">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-success">Log Employee</button>
                        </div>
                    </div>


                </form>
            </div>
        </div>
    </div>
@stop