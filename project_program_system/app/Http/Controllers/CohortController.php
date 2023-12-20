<?php

namespace App\Http\Controllers;

use App\Models\Cohort;
use App\Models\Program;
use Illuminate\Http\Request;

class CohortController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     */
    public function index(Request $request)
    {
        $cohorts = Cohort::all();

        return view('admin.cohort.index', compact('cohorts'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     */
    public function create()
    {
        $programs = Program::get();
        return view('admin.cohort.create', ['programs' => $programs]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'code' => ['required', 'string', 'max:15'],
            'name' => ['required', 'string', 'max:255'],
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date'],
            'total_students' => ['required', 'string'],
            'program_id' => ['required', 'integer', 'exists:programs,id'],
        ]);
        //dd($request);
        $cohort = Cohort::create($request->all());

        return redirect()->route('cohort.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Cohort $cohort
     */
    public function show(Request $request, Cohort $cohort)
    {
        return view('admin.cohort.show', compact('cohort'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Cohort $cohort
     */
    public function edit(Request $request, Cohort $cohort)
    {
        $programs = Program::get();
        return view('admin.cohort.edit', ['cohort' => $cohort, 'programs' => $programs]);
    }

    /**
     * @param \App\Models\Cohort $cohort
     */
    public function update(Request $request, Cohort $cohort)
    {
        $request->validate([
            'code' => ['required', 'string', 'max:15'],
            'name' => ['required', 'string', 'max:255'],
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date'],
            'total_students' => ['required', 'string'],
            'program_id' => ['required', 'integer', 'exists:programs,id'],
        ]);
        $cohort->update($request->all());
        return redirect()->route('cohort.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Cohort $cohort
     */
    public function destroy(Request $request, Cohort $cohort)
    {
        $cohort->delete();

        return redirect()->route('cohort.index');
    }
}
