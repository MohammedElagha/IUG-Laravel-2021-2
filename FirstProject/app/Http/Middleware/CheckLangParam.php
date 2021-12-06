<?php

namespace App\Http\Middleware;

use Closure;
use App;

class CheckLangParam
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
        if ($request->query->has('lang')) {
            $lang = $request->query('lang');

            if ($lang == 'ar' || $lang == 'en') {
                App::setLocale($lang);
                return $next($request);
            }
        }

        return response()->view('errors.missing');
    }
}
