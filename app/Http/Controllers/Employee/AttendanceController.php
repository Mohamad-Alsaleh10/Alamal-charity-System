<?php
namespace App\Http\Controllers\Employee;

use App\Employee;
use App\Attendancesemployee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AttendanceController extends Controller
{
    public function index(Request $request)
    {
        $date = $request->input('date', date('Y-m-d'));
        $employees = Employee::with(['attendancesemployees' => function($query) use ($date) {
            $query->where('date', $date);
        }])->get();

        return view('pages.employees.Attendance.index', compact('employees', 'date'));
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

        return redirect()->route('attendance_employee.index')->with('status', 'Attendance saved successfully!');
    }

    public function search(Request $request)
    {
        $request->validate([
            'from' => 'required|date',
            'to' => 'required|date',
            'employee_id' => 'nullable|exists:employees,id'
        ]);

        $from = $request->input('from');
        $to = $request->input('to');
        $employeeId = $request->input('employee_id');

        $query = Attendancesemployee::with('employee')
            ->whereBetween('date', [$from, $to]);

        if ($employeeId != 0) {
            $query->where('employee_id', $employeeId);
        }

        $attendances = $query->get();

        return view('pages.employees.Attendance.search_results', compact('attendances', 'from', 'to', 'employeeId'));
    }

    public function show($id)
    {
        $attendance = Attendancesemployee::with('employee')->find($id);

        if (!$attendance || !$attendance->employee) {
            return view('pages.employees.Attendance.show')->with('message', 'Attendance or Employee data is not available.');
        }

        return view('pages.employees.Attendance.show', compact('attendance'));
    }
}
