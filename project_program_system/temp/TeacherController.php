<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     */
    public function index(Request $request)
    {
        $teachers = Teacher::get();
        return view('admin.teacher.index', compact('teachers'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     */
    public function create()
    {
        $programs = Program::get();
        return view('admin.teacher.create', ['programs' => $programs]);
    }

    public function store(Request $request)
    {

        $request->validate([
            'identification' => ['required', 'string'],
            'name' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:50'],
            'address' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:15'],
            'email' => ['required', 'email', 'max:255'],
            'birth_date' => ['required', 'date'],
            'photo' => ['required', 'string', 'max:255'],
            'academic_formation' => ['required', 'string'],
            'knowledge_areas' => ['required', 'string'],
            'programs' => 'required|array|min:1',
        ]);

        $teacher = Teacher::create($request->all());

        $teacher->programs()->attach($request->input('programs'));
        return redirect()->route('teacher.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Teacher $teacher
     */
    public function show(Request $request, Teacher $teacher)
    {
        return view('admin.teacher.show', compact('teacher'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Teacher $teacher
     */
    public function edit(Teacher $teacher)
    {
        $programs = Program::get();
        return view('admin.teacher.edit', ['teacher' => $teacher, 'programs' => $programs]);
    }

    /**
     *
     * @param \App\Models\Teacher $teacher
     */
    public function update(Request $request, Teacher $teacher)
    {

        $request->validate([
            'identification' => ['required', 'string'],
            'name' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:50'],
            'address' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:15'],
            'email' => ['required', 'email', 'max:255'],
            'birth_date' => ['required', 'date'],
            'photo' => ['required', 'string', 'max:255'],
            'academic_formation' => ['required', 'string'],
            'knowledge_areas' => ['required', 'string'],
            'programs' => 'required|array|min:1',
        ]);
        dd(session('errors'));
        $teacher->update($request->all());

        return redirect()->route('teacher.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Teacher $teacher
     */
    public function destroy(Request $request, Teacher $teacher)
    {
        $teacher->delete();

        return redirect()->route('teacher.index');
    }
}
