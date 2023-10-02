<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Post\BaseController;
use App\Http\Filters\PostFilter;
use App\Http\Requests\Post\FilterRequest;
use App\Models\Post;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $posts = Post::all();
        return view('admin.index', compact('posts'));
    }
}
