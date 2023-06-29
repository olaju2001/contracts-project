<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class setLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    { 
      $locale = $request->server('HTTP_ACCEPT_LANGUAGE');
      
      if ($locale) {
          $locale = substr($locale, 0, 2);
          if (in_array($locale, ['en', 'ar', 'de'])) {
            app()->setLocale($locale);
          } else {
            app()->setLocale('en');
          }
      }
        if ($request->wantsJson()) {
            // if (in_array(request()->header('Lang'), ['ar', 'de'])) {
            //     app()->setLocale(request()->header('Lang'));
            // } elseif (auth('api')->check()) {
            //     $lang = auth('api')->user()->lang ?? 'ar';
            //     app()->setLocale($lang);
            // } else {
            //     app()->setLocale('ar');
            // }
        }
        return $next($request);
    }
}
