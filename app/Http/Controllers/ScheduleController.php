<?php

namespace App\Http\Controllers;
use App\Schedule;
use App\Models\Subject;
use App\Models\Grade;
use App\Models\Classroom;
use App\Models\Teacher;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::with(['subject', 'grade', 'classroom', 'teacher'])->get();
        return view('pages.schedules.index', compact('schedules'));
    }

    public function create()
    {
        $subjects = Subject::all();
        $grades = Grade::all();
        $classrooms = Classroom::all();
        $teachers = Teacher::all();
        return view('pages.schedules.create', compact('subjects', 'grades', 'classrooms', 'teachers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'subject_id' => 'required',
            'grade_id' => 'required',
            'classroom_id' => 'required',
            'teacher_id' => 'required',
            'day' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        Schedule::create($request->all());

        return redirect()->route('schedule.index');
    }

    public function edit(Schedule $schedule)
    {
        $subjects = Subject::all();
        $grades = Grade::all();
        $classrooms = Classroom::all();
        $teachers = Teacher::all();
        return view('pages.schedules.edit', compact('schedule', 'subjects', 'grades', 'classrooms', 'teachers'));
    }

    public function update(Request $request, Schedule $schedule)
    {
        $request->validate([
            'subject_id' => 'required',
            'grade_id' => 'required',
            'classroom_id' => 'required',
            'teacher_id' => 'required',
            'day' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        $schedule->update($request->all());

        return redirect()->route('schedules.index');
    }

    public function destroy(Schedule $schedule)
    {
        $schedule->delete();
        return redirect()->route('schedule.index');
    }
}
