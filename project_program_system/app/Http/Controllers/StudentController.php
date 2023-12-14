<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentStoreRequest;
use App\Http\Requests\StudentUpdateRequest;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     */
    public function index(Request $request)
    {
        $students = Student::all();

        return view('admin.student.index', compact('students'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     */
    public function create()
    {
        return view('admin.student.create', ['student' => null]);
    }

    /**
     * @param \App\Http\Requests\StudentStoreRequest $request
     */
    public function store(StudentStoreRequest $request)
    {
        $student = Student::create($request->validated());

        return redirect()->route('student.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Student $student
     */
    public function show(Request $request, Student $student)
    {
        return view('admin.student.show', compact('student'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Student $student
     */
    public function edit(Request $request, Student $student)
    {
        return view('student.edit', compact('student'));
    }

    /**
     * @param \App\Http\Requests\StudentUpdateRequest $request
     * @param \App\Models\Student $student
     */
    public function update(StudentUpdateRequest $request, Student $student)
    {
        $student->update($request->validated());

        return redirect()->route('student.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Student $student
     */
    public function destroy(Request $request, Student $student)
    {
        $student->delete();

        return redirect()->route('student.index');
    }
}
