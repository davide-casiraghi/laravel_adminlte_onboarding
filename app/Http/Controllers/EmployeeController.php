<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeStoreRequest;
use App\Models\Employee;
use App\Models\Company;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|Response
     */
    public function index()
    {
        $employees = Employee::paginate(10);

        return view('employees.index', [
            'employees' => $employees,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|Response
     */
    public function create()
    {
        $companies = Company::pluck('name','id');

        return view('employees.create', [
            'companies' => $companies,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  EmployeeStoreRequest  $request
     * @return RedirectResponse
     */
    public function store(EmployeeStoreRequest $request)
    {
        $employee = Employee::create($request->validated());

        return redirect()->route('employees.index')
            ->with('success', 'Employee created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|Response
     */
    public function show(int $id)
    {
        $employee = Employee::find($id);

        return view('employees.show', [
            'employee' => $employee,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|Response
     */
    public function edit(int $id)
    {
        $employee = Employee::find($id);
        $companies = Company::pluck('name','id');

        return view('employees.edit', [
            'employee' => $employee,
            'companies' => $companies,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  EmployeeStoreRequest  $request
     * @param  int  $id
     * @return RedirectResponse
     */
    public function update(EmployeeStoreRequest $request, int $id)
    {
        Employee::find($id)->update($request->validated());

        return redirect()->route('employees.index')
            ->with('success', 'Employee updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        Employee::destroy($id);

        return redirect()->route('employees.index')
            ->with('success', 'Employee deleted successfully');
    }
}
