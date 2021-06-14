<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class FilterPegawaiOnly
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
        $pegawai = $request->user()->as_pegawai()->get();

        if ($pegawai->isEmpty()) {
            return redirect('dashboard');
        }

        return $next($request);
    }
}
