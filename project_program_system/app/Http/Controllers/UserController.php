<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     */
    public function index(Request $request)
    {
        $users = User::all();

        return view('admin.user.index', compact('users'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     */
    public function create()
    {
        return view('admin.user.create', ['user' => null]);
    }

    /**
     * @param \App\Http\Requests\UserStoreRequest $request
     */
    public function store(UserStoreRequest $request)
    {
        $user = User::create($request->validated());

        return redirect()->route('user.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     */
    public function show(Request $request, User $user)
    {
        return view('admin.user.show', compact('user'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     */
    public function edit(Request $request, User $user)
    {
        return view('admin.user.edit', compact('user'));
    }

    /**
     * @param \App\Http\Requests\UserUpdateRequest $request
     * @param \App\Models\User $user
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        $user->update($request->validated());

        return redirect()->route('user.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     */
    public function destroy(Request $request, User $user)
    {
        $user->delete();

        return redirect()->route('user.index');
    }
}
