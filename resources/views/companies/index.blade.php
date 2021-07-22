@extends('layouts.dashboard')

@section('title')
    Companies
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Companies</h3>

            <div class="card-tools">
                <a class="btn btn-primary btn-sm" href="{{route('companies.create')}}">
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
                    <th style="width: 20%">
                        Company Name
                    </th>
                    <th style="width: 30%">
                        Email
                    </th>
                    <th style="width: 20%">
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($companies as $company)
                    <tr>
                        <td>
                            {{$company->id}}
                        </td>
                        <td>
                            {{$company->name}}
                            <br/>
                            <small>
                                Created {{$company->created_at->format('j F, Y')}}
                            </small>
                        </td>
                        <td>
                            {{$company->email}}
                        </td>
                        <td class="project-actions text-right">
                            <a class="btn btn-primary btn-sm" href="{{route('companies.show', $company->id)}}">
                                <i class="fas fa-folder">
                                </i>
                                View
                            </a>
                            <a class="btn btn-info btn-sm" href="{{route('companies.edit', $company->id)}}">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Edit
                            </a>


                            <form action="{{ route('companies.destroy',$company->id) }}" method="POST" class="d-inline">
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
            {{ $companies->links() }}
        </div>
    </div>
@endsection




