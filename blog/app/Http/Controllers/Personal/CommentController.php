<?php

namespace App\Http\Controllers\Personal;

use App\Http\Controllers\Controller;
use App\Http\Requests\Personal\UpdateCommentsRequest;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $comments = auth()->user()->comments;
        return view('personal.comments.index', compact('comments'));
    }

    /**
     * Display the specified resource.
     *
     */
    public function show(Comment $comment)
    {
        return view('personal.comments.show', compact('comment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(Comment $comment)
    {
        return view('personal.comments.edit', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(UpdateCommentsRequest $request, Comment $comment)
    {
        $data = $request->validated();
        $comment->update($data);
        return to_route('personal.comments.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return to_route('personal.comments.index');
    }
}
