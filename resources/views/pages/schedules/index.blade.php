@extends('layouts.master')
@section('css')
    @toastr_css
@endsection
@section('title')
    قائمة الجداول
@stop
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    قائمة الجداول
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <a href="{{route('schedule.create')}}" class="btn btn-success btn-sm" role="button"
                       aria-pressed="true">اضافة جدول جديد</a><br><br>
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered p-0">
                            <thead>
                            <tr>
                                <th>الاسم</th>
                                <th>المرحلة الدراسية</th>
                                <th>الصف الدراسي</th>
                                <th>المعلم</th>
                                <th>اليوم</th>
                                <th>بداية الوقت</th>
                                <th>نهاية الوقت</th>
                                <th>العمليات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($schedules as $schedule)
                                <tr>
                                    <td>{{$schedule->subject->name}}</td>
                                    <td>{{$schedule->grade->Name}}</td>
                                    <td>{{$schedule->classroom->Name_Class}}</td>
                                    <td>{{$schedule->teacher->Name}}</td>
                                    <td>{{$schedule->day}}</td>
                                    <td>{{$schedule->start_time}}</td>
                                    <td>{{$schedule->end_time}}</td>
                                    <td>
                                        <form action="{{route('schedule.destroy',$schedule->id)}}" method="post"
                                              style="display: inline-block">
                                            {{ method_field('Delete') }}
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm"><i
                                                    class="fa fa-trash"></i></button>
                                        </form>
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
    <!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render
@endsection
