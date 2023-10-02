<?php

namespace App\Services\Post;

use App\Models\Post;

class Service
{

    public function update(Post $post, array $data)
    {
        $tags = $data['tags'];
        unset($data['tags']);
        $post->update($data);
        $post = $post->refresh();
        $post->tags()->sync($tags);
    }

    public function store(array $data)
    {
        $tags = $data['tags'];
        unset($data['tags']);
        $post = Post::create($data);
        $post->tags()->attach($tags);
    }

}
