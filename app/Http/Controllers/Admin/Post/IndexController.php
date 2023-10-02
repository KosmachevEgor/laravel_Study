<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Post\BaseController;
use App\Http\Filters\PostFilter;
use App\Http\Requests\Post\FilterRequest;
use App\Models\Post;

class IndexController extends BaseController
{
    public function __invoke(FilterRequest $request)
    {
        $data=$request->validated();
        $filter = app()->make(PostFilter::class,['queryParams' => array_filter($data)]);

        $posts = Post::filter($filter)->paginate(5);
        return view('admin.post.index', compact('posts'));
    }
}
