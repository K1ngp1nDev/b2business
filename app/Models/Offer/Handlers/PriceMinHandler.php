<?php


namespace App\Models\Offer\Handlers;


use Closure;

class PriceMinHandler
{
    public function handle($arguments, Closure $next)
    {
        extract($arguments);

        if (isset($request->price_min)) {
            $arguments['offers']->where('price', '>=', $request->price_min);
        }
        return $next($arguments);
    }
}
