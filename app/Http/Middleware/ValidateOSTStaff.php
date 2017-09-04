<?php

namespace App\Http\Middleware;

use Closure;
use App\EQP\Models\OSTSession;
use App\EQP\Models\OSTStaff;
use App\EQP\Repositories\OSTStaffRepository;
use App\EQP\Repositories\OSTSessionRepository;

class ValidateOSTStaff
{
    private $sessionRepository;
    private $staffRepository;

    public function __construct(OSTSessionRepository $sessionRepo, OSTStaffRepository $staffRepo)
    {
        $this->sessionRepository = $sessionRepo;
        $this->staffRepository = $staffRepo;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!$request->has('ost_session_id')) 
        {
            die ('Not Authorized');
        }

        $session = $this->sessionRepository->getById($request->input('ost_session_id'));

        if(!$this->validateSession($session))
        {
            die('Invalid or expired session! Access Denied!');
        }

        $staff = $this->staffRepository->getById($session->user_id);

        if(!$this->validateStaff($staff))
        {
            die('Invalid user! Access Denied!');
        }

        return $next($request);
    }

    private function validateSession($session) 
    {
        $result = $session != null;

        if($result)
        {
            $expiration = strtotime($session->session_expire);
            $result = $expiration > time();
        }

        return $result;

    }

    private function validateStaff($staff) 
    {
        $result = $staff != null;

        if($staff)
        {
            $result = $staff->isactive && $staff->isadmin;
        }

        return $result;

    }
}
