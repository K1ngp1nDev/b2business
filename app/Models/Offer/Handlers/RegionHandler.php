<?php


namespace App\Models\Offer\Handlers;


use Closure;

class RegionHandler
{
    public function handle($arguments, Closure $next)
    {
        extract($arguments);

//        if ($request->has('region')) {
//            $arguments['products']->whereHas('regions', function ($query) use ($request) {
//                $query->where('name', 'like', '%' . $request->category . '%');
//            });
//        }
        return $next($arguments);
    }
}
