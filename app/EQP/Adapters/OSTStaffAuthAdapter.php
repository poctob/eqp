<?php

namespace App\EQP\Adapters;

use App\EQP\Models\OSTSession;
use App\EQP\Models\OSTStaff;
use App\EQP\Repositories\OSTStaffRepository;
use App\EQP\Repositories\OSTSessionRepository;
use Tymon\JWTAuth\Providers\Auth\AuthInterface;

class OSTStaffAuthAdapter implements AuthInterface
{
    private $sessionRepository;
    private $staffRepository;

    private $user;

    public function __construct(OSTSessionRepository $sessionRepo, OSTStaffRepository $staffRepo)
    {
        $this->sessionRepository = $sessionRepo;
        $this->staffRepository = $staffRepo;
    }

    /**
     * Check a user's credentials.
     *
     * @param  array  $credentials
     * @return bool
     */
    public function byCredentials(array $credentials = [])
    {
        if(!array_key_exists('ost_session_id', $credentials)) 
        {
           return false;
        }

        $session = $this->sessionRepository->getById($credentials['ost_session_id']);

        if(!$this->validateSession($session))
        {
            return false;
        }

        $staff = $this->staffRepository->getById($session->user_id);

        if(!$this->validateStaff($staff))
        {
            return false;
        }
        $this->user = $staff;

        return true;
    }

    /**
     * Authenticate a user via the id.
     *
     * @param  mixed  $id
     * @return bool
     */
    public function byId($id)
    {
        $staff = $this->staffRepository->getById($id);

        if(!$this->validateStaff($staff))
        {
            return false;
        }

        $session = $this->sessionRepository->getValidByUserId($id);

        if($session == null)
        {
            return false;
        }

        $this->user = $staff;

        return true;
    }

    /**
     * Get the currently authenticated user.
     *
     * @return mixed
     */     
    public function user()
    {
        return $this->user;
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
