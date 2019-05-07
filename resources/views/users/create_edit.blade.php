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
                @if (auth()->user()->isAdmin())
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
                @endif
                <div class="form-group">
                    <input type="submit" value="Enter" class="btn btn-primary float-right">
                </div>
            </form>
        </div>
    </div>
@endsection
