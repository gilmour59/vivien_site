@extends('layouts.app')

@section('content')
    <div class="card card-default">
        <div class="card-header">
            Profile
        </div>
        <div class="card-body">
            @include('includes.validation_errors')
            <form action="{{ route('users.update-profile') }}" method="POST">
                @csrf
                @method('PUT')
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
                    <label for="password_change">Change Password:</label>
                    <input type="checkbox" name="password_change" id="password_change">
                </div>
                <div class="form-group">
                    <label for="current_password">Current Password:</label>
                    <input type="password" name="current_password" id="current_password" class="form-control" disabled>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" class="form-control" disabled>
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password:</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" disabled>
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
                $('#current_password').prop('disabled', false);
                $('#password').prop('disabled', false);
                $('#password_confirmation').prop('disabled', false);          
            }else{
                $('#current_password').prop('disabled', true);
                $('#password').prop('disabled', true);
                $('#password_confirmation').prop('disabled', true);
            }
        });
    </script>
@endsection
