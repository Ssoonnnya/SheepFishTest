<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employees;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employees::all();
        return view('employee.show', ['employees' => $employees]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'firstName' => 'required|string',
            'lastName' => 'required|string',
            'company_id' => 'required|integer',
            'email' => 'required|email',
            'phone' => 'required|integer',
        ]);

        $productCreate = Employees::create([
            'firstName' => $request->get('firstName'),
            'lastName' => $request->get('lastName'),
            'company_id' => $request->get('company_id'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
        ]);
        return redirect('/employees');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $employees = Employees::find($id);
        return view('employee.edit', ['employees' => $employees]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
            $validated = $request->validate([
                'firstName' => 'required|string',
                'lastName' => 'required|string',
                'company_id' => 'required|integer',
                'email' => 'required|email',
                'phone' => 'required|integer',
            ]);

        $employee = Employees::findOrFail($id);

        $employee->update($validated);

        return redirect()->route('employees.show', $employee->id)->with('success', 'Company updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $employee = Employees::find($id);

        if (!$employee) {
            return redirect()->route('employees.index')->with('error', 'Employee not found');
        }

        $employee->delete();

        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully');
    }

}
