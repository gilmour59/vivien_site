@extends('layouts.app')

@section('content')
    <div class="card card-default">
        <div class="card-header">
            @isset($tag)
                Edit Tag
            @else
                Create Tag
            @endisset
        </div>
        <div class="card-body">
            @include('includes.validation_errors')
            <form action="{{ isset($tag) ? route('tags.update', $tag->id) : route('tags.store') }}" method="POST">
                @csrf
                @isset($tag)
                    @method('PUT')
                @endisset
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') ? old('name') : (isset($tag) ? $tag->name : "") }}">
                </div>
                <div class="form-group">
                    <input type="submit" value="Enter" class="btn btn-primary float-right">
                </div>                   
            </form>
        </div>
    </div>
@endsection
