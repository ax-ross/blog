<?php

namespace App\Http\Controllers\Personal;

use App\Http\Controllers\Controller;
use App\Models\Post;

class LikedPostsController extends Controller
{
    public function index()
    {
        $posts = auth()->user()->likedPosts;
        return view('personal.liked_posts.index', compact('posts'));
    }

    public function destroy($id)
    {
        auth()->user()->likedPosts()->detach($id);
        return to_route('personal.liked-posts.index');
    }
}
