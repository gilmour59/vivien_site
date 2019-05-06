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
                @isset($tag)
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
                    <input type="submit" value="Enter" class="btn btn-primary float-right">
                </div>
            </form>
        </div>
    </div>
@endsection
