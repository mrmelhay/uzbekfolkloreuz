<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $locale = $request->route('locale');

        if (!in_array($locale, ['uz', 'en'])) {
            $locale = 'uz';
             // If locale is missing or invalid in URL, we might want to redirect
             // but for simpler implementation with optional parameter, we just set default
        }

        App::setLocale($locale);
        
        // Remove locale from route parameters so it doesn't mess up controllers
        $request->route()->forgetParameter('locale');
        
        // Share locale with all views
        view()->share('currentLocale', $locale);

        return $next($request);
    }
}
