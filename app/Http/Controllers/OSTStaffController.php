<?php

namespace App\Http\Controllers;

use App\EQP\Repositories\OSTStaffRepository;
use App\EQP\Repositories\OSTSessionRepository;

class OSTStaffController extends ConfigController
{
    protected function getRepository() {
        return new OSTStaffRepository();
    }

    public function index() {

       if (!isset($_SESSION['_auth']['staff'])
                || !$_SESSION['_auth']['staff']['key'])
            echo 'nothing found';

        else {
            list($id, $auth) = explode(':', $_SESSION['_auth']['staff']['key']);
            print_r($id);
        }
    }

    public function validateUser() 
    {
        die('success');
    }

}