@extends('layouts.admin.main')
@section('content')
    <form action="{{route('admin.post.store')}}" method="post">
        @csrf
        <div class="mb-3">
            <label for="post-title">Title</label>
            <input type="text" class="form-control" name='title' id="post-title" placeholder="Title"
                   value="{{old('title')}}">
            @error('title')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="post-content" class="form-label">Content</label>
            <textarea class="form-control" name='content' id="post-content"
                      placeholder="Content">{{old('content')}}</textarea>
            @error('content')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="post-image">Image</label>
            <input type="text" class="form-control" name='image' id="post-image" placeholder="Image"
                   value="{{old('image')}}">
            @error('image')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="post-category">Category</label></br>
            <select class="form-select" id='post-category' name="category_id" aria-label="Default select example">
                @foreach($categories as $category)
                    <option
                        {{old('category_id') == $category->id ? ' selected' : ''}}
                        value="{{$category->id}}">{{$category->title}}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="multiple-tag-select">Tags</label></br>
            <select class="form-select" id="multiple-tag-select" name="tags[]" multiple
                    aria-label="multiple select example">
                @foreach($tags as $tag)
                    <option value="{{$tag->id}}">{{$tag->title}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="mt-4 btn btn-primary">Create</button>
    </form>
@endsection
