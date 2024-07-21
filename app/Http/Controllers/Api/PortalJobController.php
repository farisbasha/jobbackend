<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PortalJob;
use Illuminate\Http\Request;

class PortalJobController extends Controller
{
    public function index()
    {
        return PortalJob::with('company', 'user')->get();
    }

    public function show(PortalJob $portalJob)
    {
        return $portalJob->load('company', 'user');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string',
            'salary' => 'nullable|numeric',
            'company_id' => 'required|exists:companies,id',
        ]);

        $portalJob = PortalJob::create([
            'title' => $request->title,
            'description' => $request->description,
            'location' => $request->location,
            'salary' => $request->salary,
            'company_id' => $request->company_id,
            'user_id' => $request->user()->id,
        ]);

        return $portalJob->load('company', 'user');
    }

    public function update(Request $request, PortalJob $portalJob)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string',
            'salary' => 'nullable|numeric',
        ]);

        $portalJob->update($request->all());

        return $portalJob->load('company', 'user');
    }

    public function destroy(PortalJob $portalJob)
    {
        $portalJob->delete();

        return response()->noContent();
    }
}
