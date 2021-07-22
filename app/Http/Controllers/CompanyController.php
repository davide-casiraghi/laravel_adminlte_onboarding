<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyStoreRequest;
use App\Models\Company;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::paginate(10);

        return view('companies.index', [
            'companies' => $companies,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CompanyStoreRequest  $request
     * @return RedirectResponse
     */
    public function store(CompanyStoreRequest $request)
    {
        $data = $request->validated();

        if ($image = $request->file('image')) {
            $filename = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->storeAs('public/',$filename);
            $data['logo'] = "$filename";
        }
        Company::create($data);

        return redirect()->route('companies.index')
            ->with('success', 'Company created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $company = Company::find($id);

        return view('companies.show', [
            'company' => $company,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $company = Company::find($id);

        return view('companies.edit', [
            'company' => $company,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CompanyStoreRequest  $request
     * @param  int  $id
     * @return RedirectResponse
     */
    public function update(CompanyStoreRequest $request, int $id): RedirectResponse
    {
        $data = $request->validated();

        if ($image = $request->file('image')) {
            $filename = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->storeAs('public/',$filename);
            $data['logo'] = "$filename";
        }else{
            unset($data['logo']);
        }

        Company::find($id)->update($data);

        return redirect()->route('companies.index')
            ->with('success', 'Company updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        try{
            Company::destroy($id);
        }
        catch (QueryException $e){
            return redirect()->route('companies.index')
                ->with('error', 'Company not deleted. Please remove the companies employees before.');
        }

        return redirect()->route('companies.index')
            ->with('success', 'Company deleted successfully');
    }
}
