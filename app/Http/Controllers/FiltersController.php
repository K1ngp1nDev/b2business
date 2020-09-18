<?php

namespace App\Http\Controllers;

use App\Models\Category\Category;
use Illuminate\Http\Request;

class FiltersController extends Controller
{
    public function categories()
    {
        $categories = Category::where('parent_id', 'id');
        return view('offers.categories', [
            'categories' => $categories
        ]);
    }
}
