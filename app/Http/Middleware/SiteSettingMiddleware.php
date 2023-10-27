<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SiteSettingMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $sitesetting = SiteSetting::pluck('data','name')->toArray();
        view()->share(['sitesetting' => $sitesetting]);

        return $next($request);
    }
}
