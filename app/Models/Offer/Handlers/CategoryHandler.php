<?php

namespace App\Models\Offer\Handlers;

use Closure;

class CategoryHandler
{
    public function handle($arguments, Closure $next)
    {
        extract($arguments);

        if ($request->has('category') && !$request->has('subcategories')) {
            $arguments['offers']->whereHas('category', function ($query) use ($request) {
                $query->where('id', $request->category);
            });
        }
        return $next($arguments);
    }
}
