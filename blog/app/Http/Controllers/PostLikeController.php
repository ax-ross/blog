<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostLikeController extends Controller
{
    public function store(Post $post)
    {
        auth()->user()->likedPosts()->toggle($post);
        return redirect()->back();
    }
}
