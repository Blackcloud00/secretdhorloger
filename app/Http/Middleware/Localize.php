<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\View;

class Localize
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if(!in_array($request->locale, config('translatable.locales'))){
            $base = url()->to('');
            $segments = $request->segments();

            return redirect()->to($base . '/' .  config('app.locale') . '/'. implode('/',$segments));
        }

        if( app()->getLocale() <> $request->locale){
            app()->setLocale($request->locale);
        }
        $langData = trans("define_ui");

        View::share('langData', $langData);

       URL::defaults(['locale' => $request->locale]);

        return $next($request);
    }
}
