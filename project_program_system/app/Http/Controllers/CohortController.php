<?php

namespace App\Http\Controllers;

use App\Http\Requests\CohortStoreRequest;
use App\Http\Requests\CohortUpdateRequest;
use App\Models\Cohort;
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
        return view('admin.cohort.create', ['cohort' => null]);
    }

    /**
     * @param \App\Http\Requests\CohortStoreRequest $request
     */
    public function store(CohortStoreRequest $request)
    {
        $cohort = Cohort::create($request->validated());

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
        return view('admin.cohort.edit', compact('cohort'));
    }

    /**
     * @param \App\Http\Requests\CohortUpdateRequest $request
     * @param \App\Models\Cohort $cohort
     */
    public function update(CohortUpdateRequest $request, Cohort $cohort)
    {
        $cohort->update($request->validated());

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
