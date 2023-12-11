<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Companies;

class CompaniesController extends Controller
{
    public function index()
    {
            $companies = Companies::all();
            return view('companies.show', ['companies' => $companies]);
    }

    public function create()
    {
        return view('companies.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'logo' => 'required|string',
            'website' => 'required|url',
        ]);

        $productCreate = Companies::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'logo' => $request->get('logo'),
            'website' => $request->get('website'),
        ]);
        return redirect('/companies');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function edit($id)
    {
        $companies = Companies::find($id);
        return view('companies.edit', ['companies' => $companies]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'logo' => 'required|string',
            'website' => 'required|url',
        ]);
        $company = Companies::findOrFail($id);

        $company->update($validated);

        return redirect()->route('companies.index', $company->id)->with('success', 'Company updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $company = Companies::find($id);

        if (!$company) {
            return redirect()->route('companies.index')->with('error', 'Company not found');
        }

        $company->delete();

        return redirect()->route('companies.index')->with('success', 'Company deleted successfully');

    }
}
