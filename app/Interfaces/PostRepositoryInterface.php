<?php

namespace App\Interfaces;

interface PostRepositoryInterface 
{
    public function createPost(array $postDetails);
}