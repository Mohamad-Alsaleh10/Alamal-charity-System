<?php

namespace App\Http\Controllers\Employee;

use App\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('pages.employees.index', compact('employees'));

        // return 'hello world';
    }

    public function create()
    {
        return view('pages.employees.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:employees',
            'mobile' => 'required',
            'position' => 'required',
            'address' => 'required',
        ]);

        Employee::create($request->all());
        return redirect()->route('employees.index');
    }

    public function show(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }

    public function edit(Employee $employee)
    {
        return view('pages.employees.edit', compact('employee'));
    }

    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:employees,email,' . $employee->id,
            'mobile' => 'required',
            'position' => 'required',
            'address' => 'required',
        ]);

        $employee->update($request->all());
        return redirect()->route('employees.index');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index');
    }
}
