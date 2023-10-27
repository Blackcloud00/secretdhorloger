<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PanelSettingsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
       return $next($request);
    }
}
