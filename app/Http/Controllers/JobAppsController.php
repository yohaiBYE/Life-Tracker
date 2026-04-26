<?php

namespace App\Http\Controllers;

use App\Models\JobApps;
use Illuminate\Http\Request;
use App\Http\Requests\StoreJobAppsRequest;
use App\Http\Requests\UpdateJobAppsRequest;

class JobAppsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobApps = auth()->user()
            ->jobApps()
            ->latest('applied_at')
            ->paginate(20);

        return view('job_apps.index', compact('jobApps'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $status = ['pending', 'interview', 'offered', 'rejected'];

        return view('job_apps.create', compact('status'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJobAppsRequest $request)
    {
        auth()->user()->jobApps()->create(
            $request->validated()
        );

        return redirect()
            ->route('job_apps.index')
            ->with('success', 'Application submitted successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(JobApps $jobApps)
    {
        $this->authorize('view', $jobApps);

        return view('job_apps.show', compact('jobApps'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JobApps $jobApps)
    {
        $this->authorize('update', $jobApps);

        $status = ['pending', 'interview', 'offered', 'rejected'];

        return view('job_apps.edit', compact('jobApps', 'status'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJobAppsRequest $request, JobApps $jobApps)
    {
        $this->authorize('update', $jobApps);

        $jobApps->update(
            $request->validated()
        );

        return redirect()
            ->route('job_apps.index')
            ->with('success', 'Application updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobApps $jobApps)
    {
        $this->authorize('delete', $jobApps);

        $jobApps->delete();

        return redirect()
            ->route('job_apps.index')
            ->with('success', 'Application deleted successfully.');
    }
}
