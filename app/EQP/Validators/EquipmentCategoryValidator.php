<?php

namespace App\EQP\Validators;

use App\EQP\Models\EquipmentCategory;

class EquipmentCategoryValidator implements IValidator
{
     private $errors = array();

     public function validate($entity)
     {
        $retval = isset($entity) && $entity !='undefined';

        if ($retval) 
        {            
            $retval = isset($entity['name']) 
            && $entity['name'] != 'undefined' 
            && strlen($entity['name']) > 0;

            if (!$retval) 
            {
                $this->addError('name', 'required');            
            }

            $retval = isset($entity['ispublic'])
            && $entity['ispublic'] !== 'undefined';

            if (!$retval) 
            {
                $this->addError('ispublic', 'required');            
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