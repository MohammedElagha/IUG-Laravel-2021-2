<?php

namespace App\Http\Middleware;

use Closure;
use App\Country;

class CheckCountry
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
        if ($request->has('country')) {
            $country_code = $request['country'];

            $is_found = Country::where('code', $country_code)->exists();

            if (!$is_found) {
                $request['country'] = 'PS';
            }
        }

        return $next($request);
    }
}
