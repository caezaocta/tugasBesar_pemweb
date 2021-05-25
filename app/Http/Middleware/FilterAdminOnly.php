<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class FilterAdminOnly
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
        $admins = config('auth.admins');
        $username = $request->user()->name;

        if (! in_array($username, $admins)) {
            return redirect('dashboard');
        }

        return $next($request);
    }
}
