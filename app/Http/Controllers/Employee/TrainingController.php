<?php

namespace App\Http\Controllers\Employee;

use App\Employee;
use App\Training;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TrainingController extends Controller
{
    public function index()
    {
        $trainings = Training::with('participants')->get();
        return view('pages.training.index', compact('trainings'));


    }

    public function create()
    {
        $employees = Employee::all();
        return view('pages.training.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'training_name' => 'required',
            'trainer_name' => 'required',
            'training_place' => 'required',
            'training_type' => 'required',
            'training_hours' => 'required|integer',
            'participants' => 'required|array',
        ]);

        $training = Training::create($request->all());

        $training->participants()->attach($request->participants);

        return redirect()->route('training.index');
    }

    public function show(Training $training)
    {
        return view('pages.training.show', compact('training'));
    }

    public function edit(Training $training)
    {
        $employees = Employee::all();
        return view('pages.training.edit', compact('training', 'employees'));
    }

    public function update(Request $request, Training $training)
    {
        $request->validate([
            'training_name' => 'required',
            'trainer_name' => 'required',
            'training_place' => 'required',
            'training_type' => 'required',
            'training_hours' => 'required|integer',
            'participants' => 'required|array',
        ]);

        $training->update($request->all());
        $training->participants()->sync($request->participants);

        return redirect()->route('training.index');
    }

    public function destroy(Training $training)
    {
        $training->delete();
        return redirect()->route('training.index');
    }
}
