<?php

namespace App\EQP\Validators;

interface IValidator
{
    public function validate($entity);
    public function addError($variable, $error);
    public function getErrors();
}