<?php

namespace App\Http\Controllers\Personal;

use App\Http\Controllers\Controller;
use App\Http\Requests\Personal\UpdateUserCommentsRequest;
use App\Models\Comment;
use Illuminate\Http\Request;

class UserCommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $comments = auth()->user()->comments;
        return view('personal.user_comments.index', compact('comments'));
    }

    /**
     * Display the specified resource.
     *
     */
    public function show($id)
    {
        $comment = Comment::findOrFail($id);
        return view('personal.user_comments.show', compact('comment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit($id)
    {
        $comment = Comment::findOrFail($id);
        return view('personal.user_comments.edit', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(UpdateUserCommentsRequest $request, $id)
    {
        $data = $request->validated();
        $comment = Comment::findOrFail($id);
        $comment->update($data);
        return to_route('personal.user-comments.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
