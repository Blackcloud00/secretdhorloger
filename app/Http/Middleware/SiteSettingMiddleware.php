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
        $countQty = 0;
        $wishlistHeaderItem = session('wishlist',[]);
        foreach($wishlistHeaderItem as $item) {
            $countQty += $item['qty'];
        }
        view()->share(['sitesetting' => $sitesetting, 'countQty' => $countQty]);
        return $next($request);
    }
}
