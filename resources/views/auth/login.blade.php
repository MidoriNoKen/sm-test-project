@extends('layouts.app')

@section('content')
    <div class="login-form">
        <h2>Login</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required>
            </div>

            <div class="form-group">
                <label for="user_type">User Type:</label>
                <select name="user_type" id="user_type" required>
                    <option value="admin">Admin</option>
                    <option value="approver">Approver</option>
                </select>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
        </form>
    </div>
@endsection
