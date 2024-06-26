<!-- resources/views/pages/employees/Attendance/search_results.blade.php -->

@extends('layouts.master')

@section('css')
    @toastr_css
@endsection

@section('title')
    Attendance Report
@endsection

@section('page-header')
    <!-- breadcrumb -->
    @section('PageTitle')
        Attendance Report
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

                <form method="post" action="{{ route('attendance_employee.search') }}" autocomplete="off">
                    @csrf
                    <h6 style="font-family: 'Cairo', sans-serif;color: blue">Search Information</h6><br>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="employee">Employees</label>
                                <select class="custom-select mr-sm-2" name="employee_id">
                                    <option value="0">All</option>
                                    @foreach($employees as $employee)
                                        <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="card-body datepicker-form">
                            <div class="input-group" data-date-format="yyyy-mm-dd">
                                <input type="text" class="form-control range-from date-picker-default" placeholder="Start Date" required name="from">
                                <span class="input-group-addon">To Date</span>
                                <input class="form-control range-to date-picker-default" placeholder="End Date" type="text" required name="to">
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">Submit</button>
                </form>

                @isset($attendances)
                <div class="table-responsive">
                    <table id="datatable" class="table table-hover table-sm table-bordered p-0" data-page-length="50" style="text-align: center">
                        <thead>
                        <tr>
                            <th class="alert-success">#</th>
                            <th class="alert-success">Name</th>
                            <th class="alert-success">Email</th>
                            <th class="alert-success">Mobile</th>
                            <th class="alert-success">Position</th>
                            <th class="alert-success">Date</th>
                            <th class="alert-warning">Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($attendances as $attendance)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $attendance->employee->name }}</td>
                                <td>{{ $attendance->employee->email }}</td>
                                <td>{{ $attendance->employee->mobile }}</td>
                                <td>{{ $attendance->employee->position }}</td>
                                <td>{{ $attendance->date }}</td>
                                <td>
                                    @if($attendance->status == 'present')
                                        <span class="btn-success">Present</span>
                                    @else
                                        <span class="btn-danger">Absent</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                @endisset
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
