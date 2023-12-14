<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProgramStoreRequest;
use App\Http\Requests\ProgramUpdateRequest;
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
        return view('admin.program.create', ['program' => null]);
    }

    /**
     * @param \App\Http\Requests\ProgramStoreRequest $request
     */
    public function store(ProgramStoreRequest $request)
    {
        $program = Program::create($request->validated());
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
        return view('admin.program.edit', compact('program'));
    }

    /**
     * @param \App\Http\Requests\ProgramUpdateRequest $request
     * @param \App\Models\Program $program
     */
    public function update(ProgramUpdateRequest $request, Program $program)
    {
        $program->update($request->validated());

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
