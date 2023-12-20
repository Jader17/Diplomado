<?php

namespace App\Http\Controllers;

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

    public function store(Request $request)
    {
        $request->validate([
            'identification' => ['required', 'string', 'max:15'],
            'name' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:50'],
            'address' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:15'],
            'email' => ['required', 'email', 'max:255'],
            'birth_date' => ['required', 'date'],
            'photo' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'link_date' => ['required', 'date'],
            // 'agreement' => ['required', 'string', 'max:255'],
            // 'password' => ['required', 'password', 'max:45', 'confirmed'],
            'role' => ['required', 'string', 'max:50'],
            'job' => ['required', 'string', 'max:100'],
        ]);
        $user = User::create($request->all());


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
     * @param \App\Models\User $user
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'identification' => ['required', 'string', 'max:15'],
            'name' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:50'],
            'address' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:15'],
            'email' => ['required', 'email', 'max:255'],
            'birth_date' => ['required', 'date'],
            'link_date' => ['required', 'date'],
            'password' => ['nullable', 'min:8', 'confirmed'],
            'role' => ['required', 'string', 'max:50'],
            'job' => ['required', 'string', 'max:100'],
        ]);

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('public/photos');
            $user->photo = $photoPath;
        }

        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        $user->update($request->except('photo', 'password'));

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
