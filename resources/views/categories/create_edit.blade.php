@extends('layouts.app')

@section('content')
    <div class="card card-default">
        <div class="card-header">
            @isset($category)
                Edit Category
            @else
                Create Category
            @endisset
        </div>
        <div class="card-body">
            @include('includes.validation_errors')
            <form action="{{ isset($category) ? route('categories.update', $category->id) : route('categories.store') }}" method="POST">
                @csrf
                @isset($category)
                    @method('PUT')
                @endisset
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') ? old('name') : (isset($category) ? $category->name : "") }}">
                </div>
                <div class="form-group">
                    <input type="submit" value="Enter" class="btn btn-primary float-right">
                </div>
            </form>
        </div>
    </div>
@endsection
