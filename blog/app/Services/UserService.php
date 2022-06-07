<?php

namespace App\Services;

use App\Mail\User\PasswordMail;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserService
{
    public function store($data)
    {
        if (!$data['password']) {
            $data['password'] = Str::random(10);
        }
        Mail::to($data['email'])->send(new PasswordMail($data['password']));
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);
        event(new Registered($user));
    }
}
