<?php

namespace App\EQP\Validators;

use App\EQP\Models\Equipment;

class EquipmentValidator implements IValidator
{
     private $errors = array();

     public function validate($entity)
     {
        $retval = isset($entity) && $entity !='undefined';

        if ($retval) 
        {            
            $retval = isset($entity['category_id'])          
            && is_numeric($entity['category_id']);

            if (!$retval) 
            {
                $this->addError('category_id', 'required');            
            }

            $retval = isset($entity['status_id'])          
            && is_numeric($entity['status_id']);

            if (!$retval) 
            {
                $this->addError('status_id', 'required');            
            }

            $retval = isset($entity['is_published'])
            && $entity['is_published'] !== 'undefined';

            if (!$retval) 
            {
                $this->addError('is_published', 'required');            
            }

            $retval = isset($entity['is_active'])
            && $entity['is_active'] !== 'undefined';

            if (!$retval) 
            {
                $this->addError('is_active', 'required');            
            }
         
            $retval = isset($entity['user_assigned_id']) 
            && $entity['user_assigned_id'] !== 'undefined';

            if (!$retval) 
            {
                $this->addError('user_assigned_id', 'required');            
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