@extends('layouts.main')
@section('content')
    @foreach($posts as $post)
        <div class="post mt-2 mb-2">
            <div class="post-title">
                <a  href="{{route('post.show',$post->id)}}">{{$post->id}}. {{$post->title}}</a>
            </div>
            <div class="post-content">
                {{$post->content}}
            </div>
            <div class="post-likes">
                [LikePage]{{$post->likes}}
            </div>
        </div>
    @endforeach
    <div class="mt-3 ">
        {{$posts->withQueryString()->links()}}
    </div>
@endsection
