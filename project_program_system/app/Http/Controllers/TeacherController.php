<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeacherStoreRequest;
use App\Http\Requests\TeacherUpdateRequest;
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
        return view('admin.teacher.create', ['teacher' => null]);
    }

    /**
     * @param \App\Http\Requests\TeacherStoreRequest $request
     */
    public function store(TeacherStoreRequest $request)
    {
        $teacher = Teacher::create($request->validated());

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
    public function edit(Request $request, Teacher $teacher)
    {
        return view('admin.teacher.edit', compact('teacher'));
    }

    /**
     * @param \App\Http\Requests\TeacherUpdateRequest $request
     * @param \App\Models\Teacher $teacher
     */
    public function update(TeacherUpdateRequest $request, Teacher $teacher)
    {
        $teacher->update($request->validated());

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
