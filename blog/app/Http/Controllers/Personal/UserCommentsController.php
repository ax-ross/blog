<?php

namespace App\Http\Controllers\Personal;

use App\Http\Controllers\Controller;

class UserCommentsController extends  Controller
{
    public function index()
    {
        return view('personal.user_comments.index');
    }
}
