<!-- resources/views/pages/training/index.blade.php -->

@extends('layouts.master')
@section('css')
    @toastr_css
@endsection
@section('title')
    قائمة التدريبات
@stop
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    قائمة التدريبات
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
                                <a href="{{ route('training.create') }}" class="btn btn-success btn-sm" role="button" aria-pressed="true">اضافة تدريب جديد</a><br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table table-hover table-sm table-bordered p-0" data-page-length="50" style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>اسم التدريب</th>
                                            <th>اسم المدرب</th>
                                            <th>مكان التدريب</th>
                                            <th>نوع التدريب</th>
                                            <th>ساعات التدريب</th>
                                            <th>العمليات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($trainings as $training)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $training->training_name }}</td>
                                                <td>{{ $training->trainer_name }}</td>
                                                <td>{{ $training->training_place }}</td>
                                                <td>{{ $training->training_type }}</td>
                                                <td>{{ $training->training_hours }}</td>
                                                <td>
                                                    <a href="{{ route('training.edit', $training->id) }}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_training{{ $training->id }}" title="حذف"><i class="fa fa-trash"></i></button>
                                                    <a href="{{ route('training.show', $training->id) }}" class="btn btn-primary btn-sm" role="button" aria-pressed="true"><i class="fa fa-eye"></i></a>
                                                </td>
                                            </tr>

                                            <div class="modal fade" id="delete_training{{ $training->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <form action="{{ route('training.destroy', $training->id) }}" method="post">
                                                        {{ method_field('delete') }}
                                                        {{ csrf_field() }}
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">حذف تدريب</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>هل أنت متأكد من حذف التدريب {{ $training->training_name }}؟</p>
                                                                <input type="hidden" name="id" value="{{ $training->id }}">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                                                                <button type="submit" class="btn btn-danger">حذف</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
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
