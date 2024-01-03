<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Campaigns;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CampaignsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $campaigns = Campaigns::get();
        view()->share(['campaigns' => $campaigns]);
        return $next($request);
    }
}
