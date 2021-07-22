@extends('layouts.dashboard')

@section('title')
    Company Add
@endsection

@section('content')
    <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
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
                              'value' => old('name'),
                              'required' => true,
                        ])

                        @include('partials.forms.input', [
                              'title' => "Email",
                              'name' => 'email',
                              'placeholder' => '',
                              'value' => old('email'),
                              'required' => true,
                        ])

                        @include('partials.forms.input', [
                              'title' => "Website",
                              'name' => 'website',
                              'placeholder' => '',
                              'value' => old('website'),
                              'required' => false,
                        ])

                        @include('partials.forms.upload-image', [
                           'title' => "Logo",
                           'name' => 'image',
                           'value' => '',
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
                <input type="submit" value="Create new Company" class="btn btn-success float-right">
            </div>
        </div>
    </form>
@endsection