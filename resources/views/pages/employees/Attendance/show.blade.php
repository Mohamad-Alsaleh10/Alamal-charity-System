@extends('layouts.master')

@section('css')
    @toastr_css
@section('title')
    Attendance Details
@stop
@endsection

@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    Attendance Details
@stop
<!-- breadcrumb -->
@endsection

@section('content')
    <!-- row -->
    @if(isset($message))
        <p>{{ $message }}</p>
    @else
        <h5 style="font-family: 'Cairo', sans-serif; color: red;">
            Attendance Details for {{ $attendance->employee->name }} on {{ $attendance->date }}
        </h5>

        <table class="table table-hover table-sm table-bordered p-0" style="text-align: center">
            <thead>
            <tr>
                <th class="alert-success">Employee Name</th>
                <th class="alert-success">Date</th>
                <th class="alert-success">Status</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{ $attendance->employee->name }}</td>
                <td>{{ $attendance->date }}</td>
                <td>{{ $attendance->status }}</td>
            </tr>
            </tbody>
        </table>
    @endif
    <!-- row closed -->
@endsection

@section('js')
    @toastr_js
    @toastr_render
@endsection
