<!-- resources/views/pages/training/show.blade.php -->

@extends('layouts.master')
@section('css')
    @toastr_css
@endsection
@section('title')
    تفاصيل التدريب
@stop
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    تفاصيل التدريب
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
                                <h5>اسم التدريب: {{ $training->training_name }}</h5>
                                <p>اسم المدرب: {{ $training->trainer_name }}</p>
                                <p>مكان التدريب: {{ $training->training_place }}</p>
                                <p>نوع التدريب: {{ $training->training_type }}</p>
                                <p>ساعات التدريب: {{ $training->training_hours }}</p>
                                <h6>الموظفين المشاركين:</h6>
                                <ul>
                                    @foreach($training->participants as $participant)
                                        <li>{{ $participant->name }}</li>
                                    @endforeach
                                </ul>
                                <a href="{{ route('training.index') }}" class="btn btn-secondary">العودة للقائمة</a>
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
