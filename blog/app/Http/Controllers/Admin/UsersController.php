<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Users\StoreUserRequest;
use App\Http\Requests\Admin\Users\UpdateUserRequest;
use App\Mail\User\PasswordMail;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $users = User::all();
        $roles = User::getRoles();
        return view('admin.users.index', compact('users', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $roles = User::getRoles();
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Admin\Users\StoreUserRequest  $request
     */
    public function store(StoreUserRequest $request)
    {
        $data = $request->validated();
        if (!$data['password']) {
            $data['password'] = Str::random(10);
        }
        Mail::to($data['email'])->send(new PasswordMail($data['password']));
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);
        event(new Registered($user));
        return to_route('admin.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     */
    public function show(User $user)
    {
        $roles = User::getRoles();
        return view('admin.users.show', compact('user', 'roles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     */
    public function edit(User $user)
    {
        $roles = User::getRoles();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Admin\Users\UpdateUserRequest  $request
     * @param  \App\Models\User  $user
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $data = $request->validated();
        if (is_null($data['password'])) {
            unset($data['password']);
        } else {
            $data['password'] = Hash::make($data['password']);
        }

        $user->update($data);
        return to_route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     */
    public function destroy(User $user)
    {
        $user->delete();
        return to_route('admin.users.index');
    }
}
