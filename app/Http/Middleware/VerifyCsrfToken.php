<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;
use Closure;
class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //
    ];
    /**
     * Handle an incoming request.
     * 只对get使用CSRF
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Add this:
        if($request->method() == 'POST')
        {
            return $next($request);
        }

        if ($request->method() == 'GET' || $this->tokensMatch($request))
        {
            return $next($request);
        }
        throw new TokenMismatchException;
    }
}
