@extends('layouts.dashboard')

@section('title')
    Company Edit
@endsection

@section('content')
    <form action="{{ route('companies.update',$company->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-12">
                <div class="card card-secondary">
                    <div class="card-header">
                        {{--<h3 class="card-title">Budget</h3>--}}
                    </div>
                    <div class="card-body">
                        @include('partials.forms.input', [
                              'title' => "Name",
                              'name' => 'name',
                              'placeholder' => '',
                              'value' => $company->name,
                              'required' => true,
                        ])

                        @include('partials.forms.input', [
                              'title' => "Email",
                              'name' => 'email',
                              'placeholder' => '',
                              'value' => $company->email,
                              'required' => true,
                        ])

                        @include('partials.forms.input', [
                              'title' => "Website",
                              'name' => 'website',
                              'placeholder' => '',
                              'value' => $company->website,
                              'required' => false,
                        ])

                       @include('partials.forms.upload-image', [
                            'title' => "Logo",
                            'name' => 'image',
                            'value' => $company->logo,
                        ])

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-12">
                <a href="{{route('companies.index')}}" class="btn btn-secondary">Cancel</a>
                <input type="submit" value="Update Company" class="btn btn-success float-right">
            </div>
        </div>
    </form>
@endsection