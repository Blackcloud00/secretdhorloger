<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Pages;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PagesMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $pages_sabit = Pages::get();
        view()->share(['pages_sabit' => $pages_sabit]);
        return $next($request);
    }
}
