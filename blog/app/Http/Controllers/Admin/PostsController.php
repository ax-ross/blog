<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Posts\StoreTagRequest;
use App\Http\Requests\Admin\Posts\UpdateTagRequest;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
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
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Admin\Posts\StoreTagRequest  $request
     */
    public function store(StoreTagRequest $request)
    {
        $data = $request->validated();
        $data['preview_image'] = Storage::put('/images', $data['preview_image']);
        $data['main_image'] = Storage::put('/images', $data['main_image']);
        Post::create($data);
        return to_route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Admin\Posts\UpdateTagRequest  $request
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTagRequest $request, Tag $tag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        //
    }
}
