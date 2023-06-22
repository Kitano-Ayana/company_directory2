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
                <input type="text" class="form-control" placeholder="Department" name="department">
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
                    <td>{{ $employee->department }}</td>
                    <td>
                        <a href="/employees/{{ $employee->id }}/edit" class="btn btn-primary">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endif
@endsection