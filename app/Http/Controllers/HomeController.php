<?php

namespace App\Http\Controllers;

use App\Models\Category\Category;
use App\Models\Offer\Offer;
use App\Models\User\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $offers = Offer::where('is_active', true)->paginate(5);
        $categories = Category::all();
        return view('index', [
            'offers' => $offers,
            'categories' => $categories
        ]);
    }

    public function contacts()
    {
        return view('contacts');
    }
}
