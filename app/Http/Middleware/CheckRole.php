<?php


namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
//        if (auth()->user()->role->name != $role) {
        if (auth()->user()->name != 'Admin') {
            abort(403, 'User does not have the right roles.');
        }
        return $next($request);
    }
}
