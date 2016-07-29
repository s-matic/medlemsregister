<?php

namespace App\Http\Middleware;

use Closure;

class SetupOrganization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($request->user()->organization == null)
            return redirect('setup/organization');

        return $next($request);
    }
}
