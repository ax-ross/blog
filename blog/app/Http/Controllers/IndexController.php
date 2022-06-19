<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $mostLikedPosts = Post::withCount('likesFromUsers')->orderBy('likes_from_users_count', 'DESC')->take(3)->get();
        return view('index', compact('mostLikedPosts'));
    }
}
