@extends('layouts.dashboard')

@section('title')
    Company Details
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{$company->name}}</h3>
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
                                {{$company->email}}
                            </div>
                        </div>
                        <div class="col-12">
                            <div>
                                <b>Website</b>
                            </div>
                            <div>
                                {{$company->website}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                    <img src="{{asset('images')}}/{{ $company->logo }}" width="300px" >
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
@endsection