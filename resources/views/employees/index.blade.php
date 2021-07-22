@extends('layouts.dashboard')

@section('title')
    Employees
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Employees</h3>

            <div class="card-tools">
                <a class="btn btn-primary btn-sm" href="{{route('employees.create')}}">
                    <i class="fas fa-plus"></i>
                    Add
                </a>
            </div>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped projects">
                <thead>
                <tr>
                    <th style="width: 1%">
                        #
                    </th>
                    <th style="width: 13%">
                        First Name
                    </th>
                    <th style="width: 13%">
                        Last Name
                    </th>
                    <th style="width: 18%">
                        Email
                    </th>
                    <th style="width: 15%">
                        Phone
                    </th>
                    <th style="width: 10%">
                        Company
                    </th>
                    <th style="width: 30%">
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($employees as $employee)
                    <tr>
                        <td>
                            {{$employee->id}}
                        </td>
                        <td>
                            {{$employee->first_name}}
                        </td>
                        <td>
                            {{$employee->last_name}}
                        </td>
                        <td>
                            {{$employee->email}}
                        </td>
                        <td>
                            {{$employee->phone}}
                        </td>
                        <td>
                            {{$employee->company->name}}
                        </td>
                        <td class="project-actions text-right">
                            <a class="btn btn-primary btn-sm" href="{{route('employees.show', $employee->id)}}">
                                <i class="fas fa-folder">
                                </i>
                                View
                            </a>
                            <a class="btn btn-info btn-sm" href="{{route('employees.edit', $employee->id)}}">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Edit
                            </a>

                            <form action="{{ route('employees.destroy',$employee->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash">
                                    </i>
                                    Delete
                                </button>
                            </form>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>

    {{-- Pagination --}}
    <div class="row mt-4">
        <div class="mx-auto">
            {{ $employees->links() }}
        </div>
    </div>
@endsection




