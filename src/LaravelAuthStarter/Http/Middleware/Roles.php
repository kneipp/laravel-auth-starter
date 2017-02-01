<?php

namespace Kneipp\LaravelAuthStarter\Http\Middleware;

use Closure;
use Klaravel\Ntrust\Middleware\NtrustRole;

class Roles extends NtrustRole
{
    protected $redirectTo = '/login';

    /**
     *
     * Check if user belongs to role
     *
     * @param \Illuminate\Http\Request $request
     * @param Closure $next
     * @param $roles
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|mixed
     */
    public function handle($request, Closure $next, $roles)
    {
        if ($this->auth->guest() || !$request->user()->hasRole(explode('|', $roles))) {
            return redirect($this->redirectTo);
        }

        return $next($request);
    }
}
