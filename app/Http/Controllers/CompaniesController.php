<?php

namespace App\Http\Controllers;

use App\Models\Chat\Chat;
use App\Models\Company\Company;
use App\Models\Offer\Offer;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    public function profile()
    {
        $company = auth()->user()->company;
        $offers = $company->offers;
        $chats = Chat::where('customer_id', $company->id)->orWhere('seller_id', $company->id)->get();
        return view('companies.profile', [
            'company' => $company,
            'offers' => $offers,
            'chats' => $chats
        ]);
    }

    public function edit(Request $request)
    {
        $company = Company::find(auth()->user()->company_id);
        $offers = $company->offers;
        return view('companies.edit', [
            'company' => $company,
            'offers' => $offers
        ]);
    }

    public function update(Request $request)
    {
        $images = [];
        $main_image = null;
        if ($request->has('images')) {
            foreach ($request->images as $key => $image) {
                if ($key == 0) {
                    $main_image = '/storage/images/' . $image;
                }
            }
        }

        $company = Company::find(auth()->user()->company_id);
        $company->company_phone = $request->phone;
        $company->email = $request->email;
        $company->logo = $main_image;

        $company->update();

        return redirect()->route('company.profile');
    }

    public function show(Request $request)
    {
        $company = Company::find($request->id);
        $offers = $company->offers;
        return view('companies.show', [
            'company' => $company,
            'offers' => $offers
        ]);
    }
}
