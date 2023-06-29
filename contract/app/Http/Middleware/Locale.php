<?php

namespace App\Http\Middleware;

use Closure;

class Locale {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {

        $locale = $request->server('HTTP_ACCEPT_LANGUAGE');

        if ($locale) {
            $locale = substr($locale, 0, 2);
            if (in_array($locale, ['en', 'ar', 'de'])) {
              app()->setLocale($locale);
            } else {
              app()->setLocale('en');
            }
        }

        // if (!\Session::has('locale')) {
        //     \Session::put('locale', \Config::get('app.locale'));
        // }

        // app()->setLocale(\Session::get('locale'));

        return $next($request);
    }

}
