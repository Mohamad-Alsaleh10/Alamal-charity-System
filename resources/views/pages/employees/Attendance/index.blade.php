<!-- resources/views/pages/employees/Attendance/index.blade.php -->

@extends('layouts.master')

@section('css')
    @toastr_css
@endsection

@section('title')
    Employee Attendance List
@endsection

@section('page-header')
    <!-- breadcrumb -->
    @section('PageTitle')
        Employee Attendance List
    @endsection
    <!-- breadcrumb -->
@endsection

@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (session('status'))
                        <div class="alert alert-success">
                            <ul>
                                <li>{{ session('status') }}</li>
                            </ul>
                        </div>
                    @endif



                    <form method="post" action="{{ route('attendance_employee.store') }}">
                        @csrf
                        <input type="hidden" name="date" value="{{ $date ?? date('Y-m-d') }}">

                        <h5 style="font-family: 'Cairo', sans-serif; color: red">Today's Date: {{ $date ?? date('Y-m-d') }}</h5>

                        <table id="datatable" class="table table-hover table-sm table-bordered p-0" data-page-length="50" style="text-align: center">
                            <thead>
                                <tr>
                                    <th class="alert-success">#</th>
                                    <th class="alert-success">Name</th>
                                    <th class="alert-success">Email</th>
                                    <th class="alert-success">Mobile</th>
                                    <th class="alert-success">Position</th>
                                    <th class="alert-success">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($employees as $employee)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $employee->name }}</td>
                                        <td>{{ $employee->email }}</td>
                                        <td>{{ $employee->mobile }}</td>
                                        <td>{{ $employee->position }}</td>
                                        <td>
                                            @php
                                                $attendance = $employee->attendancesemployees->where('date', $date ?? date('Y-m-d'))->first();
                                            @endphp
                                            @if($attendance)

                                                <label class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
                                                    <input name="status[{{ $employee->id }}]" {{ $attendance->status == 'present' ? 'checked' : '' }} class="leading-tight" type="radio" value="present">
                                                    <span class="text-success">Present</span>
                                                </label>
                                                <label class="ml-4 block text-gray-500 font-semibold">
                                                    <input name="status[{{ $employee->id }}]" {{ $attendance->status == 'absent' ? 'checked' : '' }} class="leading-tight" type="radio" value="absent">
                                                    <span class="text-danger">Absent</span>
                                                </label>
                                                <a href="{{ route('attendance_employee.show', $attendance) }}"
                                                style="background: green;color: white;padding: 10px;border-radius: 10px;height: 56%;displa;display: inline-block; 29%;margin-right: 19px;"
                                                >View</a>
                                            @else
                                                <label class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
                                                    <input name="status[{{ $employee->id }}]" class="leading-tight" type="radio" value="present">
                                                    <span class="text-success">Present</span>
                                                </label>
                                                <label class="ml-4 block text-gray-500 font-semibold">
                                                    <input name="status[{{ $employee->id }}]" class="leading-tight" type="radio" value="absent">
                                                    <span class="text-danger">Absent</span>
                                                </label>
                                            @endif
                                            <input type="hidden" name="employee_id[]" value="{{ $employee->id }}">
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <p>
                            <button class="btn btn-success" type="submit">Submit</button>
                        </p>
                    </form>
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
