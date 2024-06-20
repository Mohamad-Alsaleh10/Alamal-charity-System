<!-- resources/views/pages/employees/create.blade.php -->
@extends('layouts.master')

@section('css')
    @toastr_css
@section('title')
    Add Employee
@stop
@endsection

@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    Add Employee
@stop
<!-- breadcrumb -->
@endsection

@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    @if(session()->has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ session()->get('error') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="col-xs-12">
                        <div class="col-md-12">
                            <br>
                            <form action="{{ route('employees.store') }}" method="post">
                                @csrf
                                <div class="form-row">
                                    <div class="col">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" class="form-control" required>
                                        @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" class="form-control" required>
                                        @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <br>
                                <div class="form-row">
                                    <div class="col">
                                        <label for="mobile">Mobile</label>
                                        <input type="text" name="mobile" class="form-control" required>
                                        @error('mobile')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label for="position">Position</label>
                                        <input type="text" name="position" class="form-control" required>
                                        @error('position')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <br>
                                <div class="form-row">
                                    <div class="col">
                                        <label for="address">Address</label>
                                        <textarea class="form-control" name="address" rows="4" required></textarea>
                                        @error('address')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <br>
                                <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">Add Employee</button>
                            </form>
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
