<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(12);
        $randomPosts = Post::get()->random(4);
        $mostLikedPosts = Post::withCount('likesFromUsers')->orderBy('likes_from_users_count', 'DESC')->get()->take(4);
        return view('blog', compact('posts', 'randomPosts', 'mostLikedPosts'));
    }
}
