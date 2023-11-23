<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session; // Add this line

class RedirectToCalendar
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the user has not been redirected before
        if (!Session::has('redirected_to_calendar'))
        {
            // Perform the redirect to /calendar
            Session::put('redirected_to_calendar', true);
            return redirect('/calendar');
        }

        return $next($request);
    }
}
