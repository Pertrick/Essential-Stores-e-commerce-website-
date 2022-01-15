<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
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
        if($request->user() === null){
            return response("Permission not allowed", 401);
        }
        $actions = $request->route()->getAction();
        $roles = $actions['roles'] ?? null;

        if($request->user()->hasAnyRoles($roles) ||  !$roles){
            return $next($request);
        }

        return response("Permission denied", 401);

    }
}
