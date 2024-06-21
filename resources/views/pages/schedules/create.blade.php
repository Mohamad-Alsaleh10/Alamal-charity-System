@extends('layouts.master')
@section('css')
    @toastr_css
@endsection
@section('title')
    اضافة جدول جديد
@stop
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    اضافة جدول جديد
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <form action="{{route('schedule.store')}}" method="post" autocomplete="off">
                        @csrf
                        <div class="form-row">
                            <div class="col">
                                <label for="subject_id">المادة</label>
                                <select name="subject_id" class="custom-select my-1 mr-sm-2" required>
                                    <option selected disabled>اختر المادة...</option>
                                    @foreach($subjects as $subject)
                                        <option value="{{$subject->id}}">{{$subject->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <label for="grade_id">المرحلة الدراسية</label>
                                <select name="grade_id" class="custom-select my-1 mr-sm-2" required>
                                    <option selected disabled>اختر المرحلة...</option>
                                    @foreach($grades as $grade)
                                        <option value="{{$grade->id}}">{{$grade->Name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <label for="classroom_id">الصف الدراسي</label>
                                <select name="classroom_id" class="custom-select my-1 mr-sm-2" required>
                                    <option selected disabled>اختر الصف...</option>
                                    @foreach($classrooms as $classroom)
                                        <option value="{{$classroom->id}}">{{$classroom->Name_Class}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="form-row">
                            <div class="col">
                                <label for="teacher_id">المعلم</label>
                                <select name="teacher_id" class="custom-select my-1 mr-sm-2" required>
                                    <option selected disabled>اختر المعلم...</option>
                                    @foreach($teachers as $teacher)
                                        <option value="{{$teacher->id}}">{{$teacher->Name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <label for="day">اليوم</label>
                                <select name="day" class="custom-select my-1 mr-sm-2" required>
                                    <option selected disabled>اختر اليوم...</option>
                                    <option value="Saturday">السبت</option>
                                    <option value="Sunday">الأحد</option>
                                    <option value="Monday">الاثنين</option>
                                    <option value="Tuesday">الثلاثاء</option>
                                    <option value="Wednesday">الأربعاء</option>
                                    <option value="Thursday">الخميس</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="start_time">بداية الوقت</label>
                                <input type="time" name="start_time" class="form-control" required>
                            </div>
                            <div class="col">
                                <label for="end_time">نهاية الوقت</label>
                                <input type="time" name="end_time" class="form-control" required>
                            </div>
                        </div>
                        <br>
                        <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">حفظ البيانات</button>
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
