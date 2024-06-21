@extends('layouts.master')
@section('css')
    @toastr_css
@endsection
@section('title')
    تعديل تدريب
@stop
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    تعديل تدريب
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
                            <form action="{{route('training.update', $training->id)}}" method="post" autocomplete="off">
                                {{ method_field('patch') }}
                                @csrf
                                <div class="form-row">
                                    <div class="col">
                                        <label for="training_name">اسم التدريب</label>
                                        <input type="text" name="training_name"
                                               value="{{ $training->training_name }}"
                                               class="form-control">
                                    </div>
                                    <div class="col">
                                        <label for="trainer_name">اسم المدرب</label>
                                        <input type="text" name="trainer_name"
                                               value="{{ $training->trainer_name }}"
                                               class="form-control">
                                    </div>
                                </div>
                                <br>

                                <div class="form-row">
                                    <div class="col">
                                        <label for="training_place">مكان التدريب</label>
                                        <input type="text" name="training_place"
                                               value="{{ $training->training_place }}"
                                               class="form-control">
                                    </div>
                                    <div class="col">
                                        <label for="training_type">نوع التدريب</label>
                                        <input type="text" name="training_type"
                                               value="{{ $training->training_type }}"
                                               class="form-control">
                                    </div>
                                    <div class="col">
                                        <label for="training_hours">ساعات التدريب</label>
                                        <input type="number" name="training_hours"
                                               value="{{ $training->training_hours }}"
                                               class="form-control">
                                    </div>
                                </div>
                                <br>

                                <div class="form-row">
                                    <div class="form-group col">
                                        <label for="participants">المشاركون</label>
                                        <select class="custom-select my-1 mr-sm-2" name="participants[]" multiple>
                                            @foreach($employees as $employee)
                                                <option value="{{$employee->id}}" 
                                                    {{ in_array($employee->id, $training->participants->pluck('id')->toArray()) ? 'selected' : '' }}>
                                                    {{$employee->name}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">حفظ البيانات</button>
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
