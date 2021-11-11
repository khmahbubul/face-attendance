<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckCompanyId
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
        if (sizeof($request->route()->parameters) == 1) {
            $companyId = reset($request->route()->parameters)->company_id;
            if (!empty($companyId) && $companyId != auth()->user()->company_id)
                return redirect('home');
        }

        return $next($request);
    }
}
