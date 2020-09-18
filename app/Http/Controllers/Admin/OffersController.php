<?php


namespace App\Http\Controllers\Admin;


use App\Models\Offer\Offer;

class OffersController
{
    public function index()
    {
        $offers = Offer::all();
        return view('admin.offers.index', [
            'offers' => $offers
        ]);
    }
}
