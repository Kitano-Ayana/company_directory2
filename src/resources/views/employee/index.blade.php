@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Employee Directory</h1>

    <!-- Search form -->
    <form method="GET" action="/employees" class="mb-4">
        <div class="form-row">
            <div class="col">
                <input type="text" class="form-control" placeholder="Name" name="name">
            </div>
            <div class="col">
                <input type="text" class="form-control" placeholder="Employee Number" name="employee_number">
            </div>
            <div class="col">
            <label for="department">Department</label>
    <select class="form-control" id="department" name="department">
        <option value="">Select department</option>
        @foreach($departments as $department)
            <option value="{{ $department->id }}">{{ $department->name }}</option>
        @endforeach
    </select>
            </div>
            <div class="col">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </div>
    </form>

    <!-- New employee button -->
    <div class="mb-4">
        <a href="/employees/create" class="btn btn-success">Create New Employee</a>
    </div>

    <!-- Employee list -->
    @if($employees)
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Employee Number</th>
                <th scope="col">Department</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($employees as $employee)
                <tr>
                    <th scope="row">{{ $employee->id }}</th>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->employee_number }}</td>
                    <td>{{ $employee->department->name }}</td>
                    <td>
                        <a href="{{ route('employee.edit', ['id' => $employee->id]) }}" class="btn btn-primary">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endif
@endsection