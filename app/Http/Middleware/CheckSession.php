<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;

class CheckSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

         if (!Session::has('user_id')) {
            // If the session variable is not set, redirect to the login page
            //return redirect()->route('authentification'); // Change 'login' to your actual login route

 if ($request->route()->named('authentification')) {
            return $next($request);
        }

        return redirect()->route('authentification');


        }


        return $next($request);
    }
}
