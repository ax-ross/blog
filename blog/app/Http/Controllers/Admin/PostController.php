<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StorePostRequest;
use App\Http\Requests\Admin\Post\UpdatePostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Services\PostService;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    protected object $service;

    public function __construct(PostService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Admin\Post\StorePostRequest $request
     */
    public function store(StorePostRequest $request)
    {
        $data = $request->validated();
        $this->service->store($data);
        return to_route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Post $post
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Post $post
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\Admin\Post\UpdatePostRequest $request
     * @param \App\Models\Post $post
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $data = $request->validated();
        $this->service->update($post, $data);
        return to_route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Post $post
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return to_route('admin.posts.index');
    }
}
