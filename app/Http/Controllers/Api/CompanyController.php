<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        return Company::all();
    }

    public function show(Company $company)
    {
        return $company;
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'website' => 'nullable|string|url',
            'logo' => 'nullable|string',
        ]);

        $company = Company::create($request->all());

        return $company;
    }

    public function update(Request $request, Company $company)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'website' => 'nullable|string|url',
            'logo' => 'nullable|string',
        ]);

        $company->update($request->all());

        return $company;
    }

    public function destroy(Company $company)
    {
        $company->delete();

        return response()->noContent();
    }
}
