<?php

namespace App\Http\Controllers\Personal;

use App\Http\Controllers\Controller;

class LikedPostsController extends Controller
{
    public function index()
    {
        return view('personal.liked_posts.index');
    }
}
