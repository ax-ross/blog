<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostCommentRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class PostCommentController extends Controller
{
    public function store(StorePostCommentRequest $request, Post $post)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        $data['post_id'] = $post->id;
        Comment::create($data);

        return to_route('posts.show', $post->id);
    }
}
