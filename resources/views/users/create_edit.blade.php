@extends('layouts.app')

@section('content')
    <div class="card card-default">
        <div class="card-header">
            @isset($user)
                Edit User
            @else
                Create User
            @endisset
        </div>
        <div class="card-body">
            @include('includes.validation_errors')
            <form action="{{ isset($user) ? route('users.update', $user->id) : route('users.store') }}" method="POST">
                @csrf
                @isset($user)
                    @method('PUT')
                @endisset
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') ? old('name') : (isset($user) ? $user->name : "") }}">
                </div>
                <div class="form-group">
                    <label for="name">Email:</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email') ? old('email') : (isset($user) ? $user->email : "") }}">
                </div>
                <div class="form-group">
                    <label for="about">About:</label>
                    <textarea name="about" id="about" cols="30" rows="5" class="form-control">{{ old('about') ? old('about') : (isset($user) ? $user->about : "") }}</textarea>
                </div>
                <div class="form-group">
                    <label for="role">Role:</label>
                    <select name="role" id="role" class="form-control">
                        <option value="writer" {{ (old('role') === 'writer') ? "selected" : (old('role') ? "" : (isset($user) ? ($user->role === 'writer' ? "selected" : "") : "")) }}>
                            Writer
                        </option>
                        <option value="admin" {{ (old('role') === 'admin') ? "selected" : (old('role') ? "" : (isset($user) ? ($user->role === 'admin' ? "selected" : "") : "")) }}>
                            Admin
                        </option>
                    </select>
                </div>
                @isset($user)
                    <div class="form-group">
                        <label for="password_change">Change Password:</label>
                        <input type="checkbox" name="password_change" id="password_change">
                    </div>
                @endisset
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" class="form-control" @isset($user) disabled @endisset>
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password:</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" @isset($user) disabled @endisset>
                </div>
                <div class="form-group">
                    <input type="submit" value="Enter" class="btn btn-primary float-right">
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('#password_change').click(function() {
            if($('#password_change').prop('checked')){
                $('#password').prop('disabled', false);
                $('#password_confirmation').prop('disabled', false);          
            }else{
                $('#password').prop('disabled', true);
                $('#password_confirmation').prop('disabled', true);
            }
        });
    </script>
@endsection
