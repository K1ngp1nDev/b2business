<?php

namespace App\Models\Offer\Handlers;

use Closure;

class SubcategoryHandler
{
    public function handle($arguments, Closure $next)
    {
        extract($arguments);

        if ($request->has('subcategories')) {
            foreach ($request->subcategories as $key => $category) {
                if ($category == 'on') {
                    $arguments['offers']->whereHas('category', function ($query) use ($key) {
                        $query->where('name', $key);
//                        dd($query);
                    });
                }
            }
        }
        return $next($arguments);
    }
}
