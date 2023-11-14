<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class Admin_auth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Session::has('admin_email')) {
            // If the 'admin_email' session key exists, proceed to the requested route
            return $next($request);
        } else {
            // If the 'admin_email' session key does not exist, redirect to the 'admin' route
            return redirect()->route('admin'); // Replace 'admin.login' with the actual route name for your admin login page
        }

        // If the session key does not exist, redirect to the admin route

    }
}
