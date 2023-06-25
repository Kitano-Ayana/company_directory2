<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Department;
use App\ValueObjects\EmployeeNumber;


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


        $departments = Department::all();

        return view('employee.index')->with([
        'employees' => $employees,
        'departments' => $departments,
        ]);
    }

    public function create()
    {
        
         $departments = Department::all();


        return view('employee.create')->with([
            'departments' => $departments,
        ]);
    }

    public function store(Request $request)
    {

        $lastEmployee = Employee::orderBy('id', 'desc')->first();
        $newId = $lastEmployee ? $lastEmployee->id + 1 : 1;

        $employee = new Employee();
        $employeeNumber = new EmployeeNumber($request->join_year,$request->department,str_pad($newId, 4, '0', STR_PAD_LEFT));
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->phone_number = $request->phone_number;
        $employee->password = $request->password;
        $employee->department_id = $request->department;
        $employee->employee_number = (string)$employeeNumber;
        $employee->save();
    
        return redirect()->route('employee.index');
        

    }
}

