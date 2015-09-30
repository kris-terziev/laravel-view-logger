<?php

namespace Kris\LaravelViewCounter\Http;

use App\Log;
use Closure;

class ViewLogger
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
        $response = $next($request);

        $view_log = new Log();
        $view_log->ip = $request->getClientIp();
        $view_log->save();

        return $response;
    }
}
