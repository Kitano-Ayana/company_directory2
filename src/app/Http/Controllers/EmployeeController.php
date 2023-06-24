<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Department;


class EmployeeController extends Controller
{
    public function index(Request $request)
    {

        $query = Employee::query();

        if ($request->filled('name')) {
           $query->where('name', 'like', '%' . $request->input('name') . '%');
        }

        if ($request->filled('employee_number')) {
         $query->where('employee_number', $request->input('employee_number'));
        }

        $employees = $query->get();

    

         // Get a list of departments
        $departments = Department::all();

        return view('employee.index')->with([
        'employees' => $employees,
        'departments' => $departments,
        ]);
    }

    public function create()
    {
         // Get a list of departments
         $departments = Department::all();


        return view('employee.create')->with([
            'departments' => $departments,
        ]);
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'department_id' => 'required',
            'role' => 'required',
            'employee_number' => 'required|unique:employee_numbers,number',
        ]);

        $employeeNumber = new EmployeeNumber($request->year, $request->department_id, $request->unique_number);

        $employee = new Employee([
            'name' => $request->name,
            'department_id' => $request->department_id,
            'role' => $request->role,
            'number' => $employeeNumber
        ]);

        $employee->save();

        return redirect()->route('employees.index');
        

    }
}

