<?php

namespace App\EQP\Validators;

class SessionValidator implements IValidator
{
    private $error;

    public function validate($entity)
    {
        $result = $entity != null;

        if (!$result) {
            $this->addError(null, 'session cannot be null');
            return $result;
        }

        $expiration = strtotime($entity->session_expire);
        $result = $expiration > time();

        if (!$result) {
            $this->addError(null, 'session is expired');
            return $result;
        }

        return $result;
    }

    public function addError($variable, $error)
    {
        $this->error = $error;
    }

    public function getErrors()
    {
        return $this->error;
    }
}
