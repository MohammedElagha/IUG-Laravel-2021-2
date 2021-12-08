<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Log;

class HandleError
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
        try {
            return $next($request);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return response()->view('errors.error');
        }
    }
}
