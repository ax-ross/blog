<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $count_users = User::count();
        $count_categories = Category::count();
        $count_tags = Tag::count();
        $count_posts = Post::count();
        return view('admin.index', compact('count_users', 'count_categories', 'count_tags', 'count_posts'));
    }
}
