<?php


namespace App\Models\Offer\Handlers;


use App\Models\Offer\Offer;
use Closure;

class SearchHandler
{
    public function handle($arguments, Closure $next)
    {
        extract($arguments);

        if ($request->has('search')){
            $arguments['offers']->where('name', 'like', '%' . $request->search . '%')->orWhereHas('company', function ($query) use ($request) {
                $query->where('name', $request->search);
            });;
        }
//        if ($request->has('category')) {
//            $arguments['products']->whereHas('category', function ($query) use ($request) {
//                $query->where('name', 'like', '%' . $request->category . '%');
//            });
//        }
        return $next($arguments);
    }
}
