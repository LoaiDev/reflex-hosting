<?php

namespace App\Http\Middleware;

use Closure;

class EnsureUserHasPaymentMethod
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!$request->user()->hasDefaultPaymentMethod()) {
            return redirect()->guest(route('payment.edit'));
        }
        return $next($request);
    }
}
