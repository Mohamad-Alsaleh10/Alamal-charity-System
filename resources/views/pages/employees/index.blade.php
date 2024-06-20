<!-- resources/views/pages/employees/index.blade.php -->
@extends('layouts.master')

@section('css')
    @toastr_css
@section('title')
    Employee List
@stop
@endsection

@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    Employee List
@stop
<!-- breadcrumb -->
@endsection

@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <a href="{{ route('employees.create') }}" class="btn btn-success btn-sm" role="button" aria-pressed="true">Add Employee</a><br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table table-hover table-sm table-bordered p-0" data-page-length="50" style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>Position</th>
                                            <th>Address</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($employees as $employee)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $employee->name }}</td>
                                                <td>{{ $employee->email }}</td>
                                                <td>{{ $employee->mobile }}</td>
                                                <td>{{ $employee->position }}</td>
                                                <td>{{ $employee->address }}</td>
                                                <td>
                                                    <div class="dropdown show">
                                                        <a class="btn btn-success btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Actions
                                                        </a>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                            <a class="dropdown-item" href="{{ route('employees.edit', $employee->id) }}"><i style="color: green" class="fa fa-edit"></i>&nbsp; Edit</a>
                                                            <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display: inline;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="dropdown-item"><i style="color: red" class="fa fa-trash"></i>&nbsp; Delete</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection

@section('js')
    @toastr_js
    @toastr_render
@endsection
