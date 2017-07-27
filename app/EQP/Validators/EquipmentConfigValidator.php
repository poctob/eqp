<?php

namespace App\EQP\Validators;

use App\EQP\Models\EquipmentConfig;

class EquipmentConfigValidator implements IValidator
{
     private $errors = array();

     public function validate($entity)
     {
        $retval = isset($entity) && $entity !='undefined';

        if ($retval) 
        {            
            $retval = isset($entity['key']) 
            && $entity['key'] != 'undefined' 
            && strlen($entity['key']) > 0;

            if (!$retval) 
            {
                $this->addError('key', 'required');            
            }

        }
        else
        {
            $this->addError('entity', 'required');
        }

        return $retval;
     }

    public function addError($variable, $error)
    {
        $this->errors[$variable] = $error;
    }

    public function getErrors()
    {
        return $this->errors;
    }
}