<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Post\BaseController;

class IndexController extends BaseController
{
    public function __invoke()
    {
        return view('home.index');
    }
}
