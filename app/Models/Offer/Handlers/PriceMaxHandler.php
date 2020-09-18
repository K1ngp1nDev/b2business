<?php


namespace App\Models\Offer\Handlers;


use Closure;

class PriceMaxHandler
{
    public function handle($arguments, Closure $next)
    {
        extract($arguments);

        if (isset($request->price_max)) {
            $arguments['offers']->where('price', '<=', $request->price_max);
        }
        return $next($arguments);
    }
}
