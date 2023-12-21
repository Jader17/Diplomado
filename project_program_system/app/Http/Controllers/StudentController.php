<?php

namespace App\Http\Controllers;

use App\Models\Cohort;
use App\Models\Program;
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
        $programs = Program::get();
        $cohorts = $programs[0]->cohorts;
        return view('admin.student.create', ['programs' => $programs, 'cohorts' => $cohorts]);
    }

    public function getCohorts(Request $request)
    {
        $code = $request->input('program_id');
        $programs = Program::get();
        $cohorts = Program::find($code)->cohorts;
        return view('admin.student.create', ['programs' => $programs, 'cohorts' => $cohorts, 'code' => $code]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'identification' => ['required', 'string', 'max:15'],
            'name' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:50'],
            'address' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:15'],
            'email' => ['required', 'email', 'max:255'],
            'birth_date' => ['required', 'date'],
            'photo' => ['required', 'string', 'max:255'],
            'student_code' => ['required', 'string', 'max:255'],
            'semester' => ['required', 'string'],
            'civil_status' => ['required', 'string', 'max:45'],
            'join_date' => ['required', 'date'],
            'egress_date' => ['required', 'date'],
            'cohort_id' => ['required', 'integer', 'exists:cohorts,id'],
        ]);
        // dd($request->all());
        $student = Student::create($request->all());

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
        $programs = Program::get();
        $cohorts = $programs[0]->cohorts;
        return view('admin.student.edit', compact('student', 'programs', 'cohorts'));
    }


    /**
     * @param \App\Models\Student $student
     */
    public function update(Request $request, Student $student)
    {
        //dd($request->all());
        $request->validate([
            'identification' => ['required', 'string', 'max:15'],
            'name' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:50'],
            'address' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:15'],
            'email' => ['required', 'email', 'max:255'],
            'birth_date' => ['required', 'date'],
            'student_code' => ['required', 'string', 'max:255'],
            'semester' => ['required', 'string'],
            'civil_status' => ['required', 'string', 'max:45'],
            'join_date' => ['required', 'date'],
            'egress_date' => ['required', 'date'],
            'cohort_id' => ['required', 'integer', 'exists:cohorts,id'],
        ]);
        
        $student->update($request->all());

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
