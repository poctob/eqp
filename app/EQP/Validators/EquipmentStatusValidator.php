<?php

namespace App\EQP\Validators;

use App\EQP\Models\EquipmentStatus;

class EquipmentStatusValidator implements IValidator
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

            $retval = isset($entity['image_path']) 
            && $entity['image_path'] != 'undefined';

            if (!$retval) 
            {
                $this->addError('image_path', 'required');            
            }

            $retval = isset($entity['description']) 
            && $entity['description'] != 'undefined';

            if (!$retval) 
            {
                $this->addError('description', 'required');            
            }

            $retval = isset($entity['color']) 
            && $entity['color'] != 'undefined' 
            && strlen($entity['color']) > 0;

            if (!$retval) 
            {
                $this->addError('color', 'required');            
            }

            $retval = isset($entity['is_default'])
            && $entity['is_default'] !== 'undefined';

            if (!$retval) 
            {
                $this->addError('is_default', 'required');            
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