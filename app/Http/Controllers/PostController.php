<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostResource;
use App\Repositories\PostRepository;

class PostController extends Controller
{
    /**
     * Store a new post.
     *
     * @param  App\Http\Requests\StorePostRequest  $request
     * @param  App\Repositories\PostRepository $repository
     * @return Illuminate\Http\JsonResponse
     */
    public function create(StorePostRequest $request, PostRepository $repository)
    {
        $params = $request->all();
        $params['user_id'] = $request->user()->id; 
        $post = $repository->createPost($params);
        return new PostResource($post);
    }
}
