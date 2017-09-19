<?php

namespace App\Http\Middleware;

use Closure;
use App\EQP\Models\OSTSession;
use App\EQP\Models\OSTStaff;
use App\EQP\Repositories\OSTStaffRepository;
use App\EQP\Repositories\OSTSessionRepository;

use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class ValidateOSTStaff
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
        try {
            // attempt to verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($request->query())) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        // all good so return the token
       $request['jwttoken'] = $token;

        return $next($request);
    }
}
