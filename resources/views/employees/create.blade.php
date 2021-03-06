@extends('layouts.dashboard')

@section('title')
    Employee Add
@endsection

@section('content')
    <form action="{{ route('employees.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="card card-secondary">
                    <div class="card-header">
                        {{--<h3 class="card-title">Budget</h3>--}}
                    </div>
                    <div class="card-body">
                        @include('partials.forms.input', [
                                  'title' => "First Name",
                                  'name' => 'first_name',
                                  'placeholder' => '',
                                  'value' => old('first_name'),
                                  'required' => true,
                            ])
                        @include('partials.forms.input', [
                                  'title' => "Last Name",
                                  'name' => 'last_name',
                                  'placeholder' => '',
                                  'value' => old('last_name'),
                                  'required' => true,
                            ])

                        @include('partials.forms.input', [
                              'title' => "Email",
                              'name' => 'email',
                              'placeholder' => '',
                              'value' => old('email'),
                              'required' => false,
                        ])

                        @include('partials.forms.input', [
                              'title' => "Phone",
                              'name' => 'phone',
                              'placeholder' => '',
                              'value' => old('phone'),
                              'required' => false,
                        ])

                        @include('partials.forms.select', [
                            'title' => "Company",
                            'name' => 'company_id',
                            'placeholder' => 'Select company',
                            'records' => $companies,
                            //'selected' => $post->category_id,
                            'liveSearch' => 'false',
                            'mobileNativeMenu' => true,
                            'required' => true,
                        ])
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-12">
                <a href="{{route('employees.index')}}" class="btn btn-secondary">Cancel</a>
                <input type="submit" value="Create new Employee" class="btn btn-success float-right">
            </div>
        </div>
    </form>
@endsection