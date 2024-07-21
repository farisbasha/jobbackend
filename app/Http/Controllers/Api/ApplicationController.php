<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function index()
    {
        $applications  = Application::with('portalJob', 'user')->get();
        return $applications;
    }

    public function show(Application $application)
    {
        return $application->load('portalJob', 'user');
    }

    public function store(Request $request)
    {
        $request->validate([
            'cover_letter' => 'nullable|string',
            'resume' => 'nullable|string',
            'portal_job_id' => 'required|exists:portal_jobs,id',
        ]);

        $application = Application::create([
            'cover_letter' => $request->cover_letter,
            'resume' => $request->resume,
            'portal_job_id' => $request->portal_job_id,
            'user_id' => $request->user()->id,
        ]);

        return $application->load('portalJob', 'user');
    }

    public function update(Request $request, Application $application)
    {
        $request->validate([
            'cover_letter' => 'nullable|string',
            'resume' => 'nullable|string',
        ]);

        $application->update($request->all());

        return $application->load('portalJob', 'user');
    }

    public function destroy(Application $application)
    {
        $application->delete();

        return response()->noContent();
    }
}
