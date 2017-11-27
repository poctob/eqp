<?php

namespace App\EQP\Validators;

class StaffValidator implements IValidator
{
    private $error;

    public function validate($entity)
    {
        $result = $entity != null;

        if (!$result) {
            $this->addError(null, 'staff cannot be null');
            return $result;
        }

        $result = $entity->isactive;

        if (!$result) {
            $this->addError(null, 'staff is not active');
            return $result;
        }

        $result = $entity->isadmin;

        if (!$result) {
            $this->addError(null, 'staff should be in the admin group');
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
