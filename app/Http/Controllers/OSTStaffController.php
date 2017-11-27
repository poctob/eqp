<?php

namespace App\Http\Controllers;

use App\EQP\Repositories\OSTStaffRepository;
use Illuminate\Http\Request;

class OSTStaffController extends ConfigController
{
    protected function getRepository()
    {
        return new OSTStaffRepository();
    }

    public function validateUser(Request $request)
    {
        if ($request->has('jwt')) {
            $response = response()->file(public_path() . '/index.html',
                [
                    'JWT' => $request->get('jwt'),
                ]);

            return $response;

        } else {
            die('token not found');
        }

    }

}
