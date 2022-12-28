<?php

namespace App\Repositories;

use App\Interfaces\PostRepositoryInterface;
use App\Models\Post;

class PostRepository implements PostRepositoryInterface 
{
    /**
     * Store a new post.
     *
     * @param  array $postDetails
     * @return App\Models\Post
     */public function createPost(array $postDetails) 
    {
        return Post::create($postDetails);
    }
}
