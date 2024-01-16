<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AddAssets
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $requestUri = $request->getRequestUri();

//        if ($requestUri == '/applies') {
//            view()->share([
//                'css' => [
//                    'vendor/bladewind/css/animate.min.css',
//                    'vendor/bladewind/css/bladewind-ui.min.css',
//                ],
//                'js' => [
//                    'js/app.js',
//                    // Add more JS files here
//                ],
//            ]);
//        }

        return $next($request);
    }
}
