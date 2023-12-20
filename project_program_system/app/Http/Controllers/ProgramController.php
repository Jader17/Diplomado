<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     */
    public function index(Request $request)
    {
        $programs = Program::all();
        return view('admin.program.index', compact('programs'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     */
    public function create()
    {
        $users = User::get()->where('role', '=', 'Coordinador');
        return view('admin.program.create', ['users' => $users]);
    }

    public function store(Request $request)
    {

        $request->validate([
            'code' => ['required', 'string', 'max:50'],
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'logo' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:20'],
            'work_lines' => ['required', 'string', 'max:45'],
            'resolution' => ['required', 'string', 'max:255'],
            'register_date' => ['required', 'date'],
            'modality' => ['required', 'string', 'max:60'],
            'user_id' => ['required', 'integer', 'exists:users,id'],
        ]);

        $program = Program::create($request->all());
        return redirect()->route('program.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Program $program
     */
    public function show(Request $request, Program $program)
    {
        return view('admin.program.show', compact('program'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Program $program
     */
    public function edit(Request $request, Program $program)
    {
        $users = User::get()->where('role', '=', 'Coordinador');
        return view('admin.program.edit', ['program' => $program, 'users' => $users]);
    }

    /**
     * @param \App\Models\Program $program
     */
    public function update(Request $request, Program $program)
    {
        $request->validate([
            'code' => ['required', 'string', 'max:50'],
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:20'],
            //'work_lines' => ['required', 'string', 'max:45'],
            'resolution' => ['required', 'string', 'max:255'],
            'register_date' => ['required', 'date'],
            'modality' => ['required', 'string', 'max:60'],
            'user_id' => ['required', 'integer', 'exists:users,id'],
        ]);
        $program->update($request->all());
        return redirect()->route('program.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Program $program
     */
    public function destroy(Request $request, Program $program)
    {
        $program->delete();

        return redirect()->route('program.index');
    }
}
