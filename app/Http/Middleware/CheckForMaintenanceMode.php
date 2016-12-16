<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Foundation\Application;


class CheckForMaintenanceMode
{

    protected $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($this->app->isDownForMaintenance() &&
            !in_array($request->getClientIp(),['192.168.2.106']))
        {
            return response('Be right back!',503);
        }

        return $next($request);
    }
}
