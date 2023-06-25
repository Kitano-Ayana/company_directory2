@extends('layouts.app')

@section('content')

    <div class="container">
        <h2>従業員　新規作成</h2>

        <form action="{{ route('employee.store') }}" method="post">
            @csrf

            <div class="form-group">
                <label for="name">名前:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="email">メールアドレス</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="phone_number">電話番号:</label>
                <input type="tel" class="form-control" id="phone_number" name="phone_number" required>
            </div>
            
            <div class="form-group">
                <label for="join_year">入社年</label>
                    <select class="form-control" id="join_year" name="join_year">
                        @for ($year = 2020; $year <= 2025; $year++)
                            <option value="{{ $year }}" {{ old('join_year') == $year ? 'selected' : '' }}>
                                {{ $year }}
                            </option>
                        @endfor
                    </select>
            </div>

            <div class="form-group">
                <label for="department">部署:</label>
                <select class="form-control" id="department" name="department">
                    <option value="">所属部署を選択してください</option>
                    @foreach($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="password">初期パスワード</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

            <div class="form-group">
                <label for="role">役職:</label><br>
                <input type="radio" id="employee" name="role" value="employee" checked>
                <label for="employee">平社員</label><br>
                <input type="radio" id="leader" name="role" value="leader">
                <label for="leader">リーダー</label><br>
            </div>

            <button type="submit" class="btn btn-primary">作成する</button>
        </form>
    </div>

@endsection
