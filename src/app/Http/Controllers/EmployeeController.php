<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;


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


        return view('employee.index')->with('employees');
    }
}

