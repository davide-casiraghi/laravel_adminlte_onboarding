@extends('layouts.dashboard')

@section('title')
    Employee Details
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{$employee->first_name}} {{$employee->last_name}}</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                    <div class="row">
                        <div class="col-12 mb-4">
                            <div>
                                <b>Email</b>
                            </div>
                            <div>
                                {{$employee->email}}
                            </div>
                        </div>
                        <div class="col-12 mb-4">
                            <div>
                                <b>Phone</b>
                            </div>
                            <div>
                                {{$employee->phone}}
                            </div>
                        </div>
                        <div class="col-12">
                            <div>
                                <b>Company</b>
                            </div>
                            <div>
                                {{$employee->company->name}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">

                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
@endsection