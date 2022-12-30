<?php

namespace App\Repositories;

use App\Interfaces\PostRepositoryInterface;
use App\Models\Post;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class PostRepository implements PostRepositoryInterface 
{
    /**
     * Store a new post.
     *
     * @param  array $postDetails
     * @return App\Models\Post
     */
    public function createPost(array $postDetails) 
    {
        $validator = Validator::make($postDetails, [
            'title' => 'required|string|max:255',
            'content' => 'required|string|max:255',
            'user_id' => 'required|exists:App\Models\User,id',
        ]);

        if ($validator->fails()) {
            throw ValidationException::withMessages($validator->errors()->toArray());
        }

        return Post::create($validator->validated());
    }
}
