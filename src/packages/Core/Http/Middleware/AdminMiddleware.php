<?php

namespace Modules\Core\Http\Middleware;

use Closure;

use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

class AdminMiddleware
{
    /**
     * The routes that should be excluded from verification.
     *
     * @var array
     */
    protected $except = [
        'admin.login.*',
        'admin.reset.*',
    ];

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return \Illuminate\Http\Response
     */
    public function handle($request, Closure $next)
    {
        
        if (Sentinel::check()) {
            // return redirect()->route('admin.dashboard');
            return $next($request);
        }

        return redirect()->guest(route('admin.login'));
    }

}
