<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Exceptions\UnauthorizedApiException;

class Authenticate
{
    /**
     * @var Request
     */
    protected $request;

    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     *
     * @return mixed
     * @throws UnauthorizedApiException
     */
    public function handle(Request $request, Closure $next)
    {
        $this->request = $request;

        if ($this->routesToCheck()) {
            $this->authenticate();
        }
        return $next($request);
    }

    /**
     * @throws UnauthorizedApiException
     */
    protected function authenticate()
    {
        if (!Auth::guard('api')->user()) {
            throw new UnauthorizedApiException('Access token invalid or expired');
        }
    }

    /**
     * @return bool
     */
    protected function routesToCheck()
    {
        return !$this->request->routeIs('auth.login');
    }
}
