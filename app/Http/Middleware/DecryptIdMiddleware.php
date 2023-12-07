<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Contracts\Encryption\DecryptException;

class DecryptIdMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if ($request->route('id')) {
            try {
                $decryptedId = decrypt($request->route('id'));
                $request->merge(['id' => $decryptedId]);
            } catch (DecryptException $e) {
                return response()->view('common.error', ['errorMessage' => 'Invalid or tampered ID']);
            }
        }

        return $next($request);
    }
}
