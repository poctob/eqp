<?php

namespace App\Http\Middleware;

use Closure;
use Cookie;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;

class AuthJWT extends \Tymon\JWTAuth\Middleware\GetUserFromToken
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
        $jwt = $request->cookie('jwt');
        $token = null;

        if (!$jwt) {
            return $this->respond('tymon.jwt.absent', 'token_not_provided', 400);
        }

        try {
            $token = $this->auth->setToken($jwt);
            $user = $this->auth->authenticate($jwt);
        } catch (TokenExpiredException $e) {
            return $this->respond('tymon.jwt.expired', 'token_expired', $e->getStatusCode(), [$e]);
        } catch (JWTException $e) {
            return $this->respond('tymon.jwt.invalid', 'token_invalid', $e->getStatusCode(), [$e]);
        }

        if (!$user) {
            return $this->respond('tymon.jwt.user_not_found', 'user_not_found', 404);
        }

        $this->events->fire('tymon.jwt.valid', $user);

        /*  try {
        $newToken = $token->refresh();
        } catch (TokenExpiredException $e) {
        return $this->respond('tymon.jwt.expired', 'token_expired', $e->getStatusCode(), [$e]);
        } catch (JWTException $e) {
        return $this->respond('tymon.jwt.invalid', 'token_invalid', $e->getStatusCode(), [$e]);
        }
        Cookie::queue(Cookie::forget('jwt'));
        Cookie::queue('jwt', $newToken, 180);*/

        return $next($request);
    }
}
