@extends('layouts.admin.main')
@section('content')
    <div>
        <h1>Posts List</h1>
    </div>
    <div>
        <a class="btn btn-dark btn-lg" href="{{route('admin.post.create')}}">Create Post</a>
    </div>
    <div class="mt-4">
        <table class="table-dark table-bordered">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Category</th>
                <th scope="col">Title</th>
                <th scope="col">Content</th>
                <th scope="col">Image</th>
                <th scope="col">Likes</th>
                <th scope="col">Tags</th>
                <th scope="col">isEnable</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr>
                    <th class=table-dark" scope="row">{{$post->id}}</th>
                    <th class="table-dark">{{$post->category->title}}</th>
                    <th class="table-dark">{{$post->title}}</th>
                    <th class="table-dark">{{$post->content}}</th>
                    <th class="table-dark">{{$post->image}}</th>
                    <th class="table-dark">{{$post->likes}}</th>
                    <th class="table-dark">
                        @foreach($post->tags as $postTag)
                            #{{$postTag->title}} </br>
                        @endforeach
                    </th>
                    <th class="table-dark">{{$post->isEnable}}</th>
                    <th class="table-dark"><a class="btn btn-link"
                                              href="{{route('admin.post.edit', $post->id)}}">Edit</a></th>
                    <th class="table-dark">
                        <form action="{{route('admin.post.delete', $post->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <input class="btn btn-link" type="submit" value="Delete">
                        </form>
                    </th>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-2">
        {{$posts->withQueryString()->links()}}
    </div>
@endsection
