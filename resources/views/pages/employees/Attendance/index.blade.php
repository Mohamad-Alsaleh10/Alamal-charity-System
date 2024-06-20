@extends('layouts.master')

@section('css')
    @toastr_css
@section('title')
    Employee Attendance List
@stop
@endsection

@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    Employee Attendance List
@stop
<!-- breadcrumb -->
@endsection

@section('content')
    <!-- row -->

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
        <div class="alert alert-danger">
            <ul>
                <li>{{ session('status') }}</li>
            </ul>
        </div>
    @endif

    <h5 style="font-family: 'Cairo', sans-serif;color: red"> Today's Date: {{ date('Y-m-d') }}</h5>
    <form method="post" action="{{ route('attendance_employee.store') }}">

        @csrf
        <input type="hidden" name="date" value="{{ date('Y-m-d') }}">
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
                            $attendance = $employee->attendancesemployees->where('date', date('Y-m-d'))->first();
                        @endphp
                        @if($attendance)
                            <label class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
                                <input name="status[{{ $employee->id }}]"
                                       {{ $attendance->status == 'present' ? 'checked' : '' }}
                                       class="leading-tight" type="radio" value="present">
                                <span class="text-success">Present</span>
                            </label>

                            <label class="ml-4 block text-gray-500 font-semibold">
                                <input name="status[{{ $employee->id }}]"
                                       {{ $attendance->status == 'absent' ? 'checked' : '' }}
                                       class="leading-tight" type="radio" value="absent">
                                <span class="text-danger">Absent</span>
                            </label>
                        @else
                            <label class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
                                <input name="status[{{ $employee->id }}]" class="leading-tight" type="radio"
                                       value="present">
                                <span class="text-success">Present</span>
                            </label>

                            <label class="ml-4 block text-gray-500 font-semibold">
                                <input name="status[{{ $employee->id }}]" class="leading-tight" type="radio"
                                       value="absent">
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
    </form><br>
    <!-- row closed -->
@endsection

@section('js')
    @toastr_js
    @toastr_render
@endsection
