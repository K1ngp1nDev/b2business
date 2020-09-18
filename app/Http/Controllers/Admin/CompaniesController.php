<?php


namespace App\Http\Controllers\Admin;


use App\Models\Company\Company;
use Illuminate\Http\Request;

class CompaniesController
{
    public function index()
    {
        $companies = Company::all();
        return view('admin.companies.index', [
            'companies' => $companies
        ]);
    }

    public function show(Request $request)
    {
        $company = Company::find($request->id);
        return view('admin.companies.show', [
            'company' => $company
        ]);
    }
}
