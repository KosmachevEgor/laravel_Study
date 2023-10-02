<?php

namespace App\Http\Controllers\Post;

use App\Http\Filters\PostFilter;
use App\Http\Requests\Post\FilterRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;

class IndexController extends BaseController
{
    public function __invoke(FilterRequest $request)
    {
        $data=$request->validated();
        $filter = app()->make(PostFilter::class,['queryParams' => array_filter($data)]);

        $posts = Post::filter($filter)->paginate(5);

        //return PostResource::collection($posts);
        return view('post.index', compact('posts'));
    }
}
