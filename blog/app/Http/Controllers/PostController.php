<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Carbon\Carbon;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(12);
        $randomPosts = Post::get()->random(4);
        $mostLikedPosts = Post::withCount('likesFromUsers')->orderBy('likes_from_users_count', 'DESC')->get()->take(4);
        return view('posts.index', compact('posts', 'randomPosts', 'mostLikedPosts'));
    }

    public function show(Post $post)
    {
        $date = Carbon::parse($post->created_at);
        $relatedPosts = Post::where('category_id', $post->category_id)
            ->where('id', '!=', $post->id)
            ->take(3)->get();
        return view('posts.show', compact('post', 'date', 'relatedPosts'));
    }
}
