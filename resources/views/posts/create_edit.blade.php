@extends('layouts.app')

@section('content')
    <div class="card card-default">
        <div class="card-header">
            @isset($post)
                Edit Post
            @else
                Create Post
            @endisset
        </div>
        <div class="card-body">
            @include('includes.validation_errors')
            <form action="{{ isset($post) ? route('posts.update', $post->id) : route('posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @isset($post)
                    @method('PUT')
                @endisset
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ old('title') ? old('title') : (isset($post) ? $post->title : "") }}">
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea name="description" id="description" cols="5" rows="2" class="form-control">{{ old('description') ? old('description') : (isset($post) ? $post->description : "") }}</textarea>
                </div>
                <div class="form-group">
                    <label for="content">Content:</label>
                    <textarea name="content" id="content" rows="10">{{ old('content') ? old('content') : (isset($post) ? $post->content : "") }}</textarea>
                </div>
                <div class="form-inline mb-3">
                    <label for="days">Days:</label>
                    <input type="number" style="width:60px" name="days" id="days" class="form-control mr-4 ml-2" value="{{ old('days') ? old('days') : (isset($post) ? $post->days : "") }}">

                    <label for="nights">Nights:</label>
                    <input type="number" style="width:60px" name="nights" id="nights" class="form-control mr-4 ml-2" value="{{ old('nights') ? old('nights') : (isset($post) ? $post->nights : "") }}">
                </div>
                <div class="form-group">
                    <label for="price">Price (Php):</label>
                    <input type="number" style="width:100px" name="price" id="price" class="form-control" value="{{ old('price') ? old('price') : (isset($post) ? $post->price : "") }}">
                </div>
               <div class="form-group">
                   <label class="mr-2">Flight Included?</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="flight" id="flightYes" value="1"
                        {{ (old('flight') === '1') ? "checked" : (old('flight') ? "" : (isset($post) ? ($post->flight === 1 ? "checked" : "") : "")) }}>
                        <label class="form-check-label" for="flightYes">Yes</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="flight" id="flightNo" value="0"
                        {{ (old('flight') === '0') ? "checked" : (old('flight') ? "" : (isset($post) ? ($post->flight === 0 ? "checked" : "") : "")) }}>
                        <label class="form-check-label" for="flightNo">No</label>
                    </div>
               </div>
                @isset($post)
                    <div class="form-group">
                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" style="width:100px;height:auto;">
                    </div>
                @endisset
                <div class="form-group">
                    <label for="image">Image:</label>
                    <input type="file" name="image" id="image" class="form-control">
                </div>
                <div class="form-group">
                    <label for="category">Type:</label>
                    <select name="category" id="category" class="form-control">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ (old('category') == $category->id) ? "selected" : (old('category') ? "" : (isset($post) ? ($category->id === $post->category_id ? "selected" : "") : "")) }}>
                                {{ $category->type }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="published_at">Published At:</label>
                    <input type="text" name="published_at" id="published_at" class="form-control" value="{{ old('published_at') ? old('published_at') : (isset($post) ? $post->published_at : "") }}">
                </div>
                <div class="form-group">
                    <input type="submit" value="Enter" class="btn btn-primary float-right">
                </div>                    
            </form>
        </div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jodit/3.1.39/jodit.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6/css/select2.min.css"/>
@endsection

@section('scripts')
    <script src="//cdnjs.cloudflare.com/ajax/libs/jodit/3.1.39/jodit.min.js"></script>
    <script>
        $('#content').each(function () {
            var editor = new Jodit(this, {
                "toolbarAdaptive": false,
                "buttons": "|,bold,strikethrough,underline,italic,|,undo,redo,|,ul,ol,|,align,outdent,indent,|,font,fontsize,brush,paragraph,|,image,video,table,link,|,hr,eraser,source,|,symbol,print,|",
                "uploader": {
                    "insertImageAsBase64URI": true
                },
                "height": 500,
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr('#published_at',{
            enableTime : true
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.tags-multiple').select2();
        });
    </script>
@endsection
