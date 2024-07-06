<?php

namespace App\Http\Middleware;

use App\Models\Event;
use Closure;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;


class LogRequest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
       // Make it an after middleware
       $response = $next($request);

       try {
           Event::create([
               'type' => 'pageview',
               'attribute' => $request->path(),
               'useragent' => $request->userAgent(),
               'visitorid' => crypt($request->ip(), config('hashing.encryption_key'))
           ]);

           return $response;
       } catch (Error $e) {
           report($e);
           return $response;
       }
    }
}
