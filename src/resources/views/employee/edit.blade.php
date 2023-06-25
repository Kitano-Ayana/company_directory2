@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>社員編集</h1>

        <form action="{{ route('employee.update', $employee->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">名前:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $employee->name }}">
            </div>

            <div class="form-group">
                <label for="email">メールアドレス:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $employee->email }}">
            </div>

            <div class="form-group">
                <label for="phone_number">電話番号:</label>
                <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ $employee->phone_number }}">
            </div>

            <div class="form-group">
                <label for="current_department">現在の部署:</label>
                <input type="text" class="form-control" id="current_department" name="current_department" value="{{ $employee->department->name }}" disabled>
            </div>

            <div class="form-group">
                <label for="department">部署変更:</label>
                <select class="form-control" id="department" name="department">
                    <option value="">所属部署を選択してください</option>
                    @foreach($departments as $department)
                        <option value="{{ $department->id }}" @if($employee->department->id == $department->id) selected @endif>{{ $department->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">更新</button>
        </form>
    </div>
@endsection
