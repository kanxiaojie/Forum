<?php

namespace App\Http\Middleware;

use Closure;
use Auth,App;

class Language
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check())
        {
            if(Auth::user()->language)
            {
                App::setLocale(Auth::user()->language->tag);
            }
        }
        return $next($request);
    }
}
