<?php
namespace App\Http\Controllers\Employee;

use App\Employee;
use App\Attendancesemployee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AttendanceController extends Controller
{
    public function index()
    {
        $employees = Employee::with('attendancesemployees')->get();
        return view('pages.employees.Attendance.index', compact('employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_id.*' => 'required|exists:employees,id',
            'date' => 'required|date',
            'status.*' => 'required|in:present,absent',
        ]);

        foreach ($request->employee_id as $id) {
            Attendancesemployee::updateOrCreate(
                ['employee_id' => $id, 'date' => $request->date],
                ['status' => $request->status[$id]]
            );
        }

        return redirect()->route('attendance_employee.index');
    }

    public function create()
    {
        $employees = Employee::all();
        return view('attendances.create', compact('employees'));
    }

    public function show(Attendancesemployee $attendance)
    {
        return view('attendances.show', compact('attendance'));
    }

    public function edit(Attendancesemployee $attendance)
    {
        $employees = Employee::all();
        return view('attendances.edit', compact('attendance', 'employees'));
    }

    public function update(Request $request, Attendancesemployee $attendance)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'date' => 'required|date',
            'status' => 'required|in:present,absent',
        ]);

        $attendance->update($request->all());
        return redirect()->route('attendance_employee.index');
    }

    public function destroy(Attendancesemployee $attendance)
    {
        $attendance->delete();
        return redirect()->route('attendance_employee.index');
    }
}
