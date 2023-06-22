@extends('layouts.app')

@section('content')
    <div class="jumbotron">
        <h1 class="display-4">Welcome to the Employee Directory!</h1>
        <p class="lead">This is a simple employee directory system made with Laravel and Bootstrap.</p>
        <hr class="my-4">
        <p>Click the button below to view the list of employees.</p>
        <a class="btn btn-primary btn-lg" href="/employees" role="button">View Employees</a>
    </div>
@endsection
