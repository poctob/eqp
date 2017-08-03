<?php

namespace App\Http\Controllers;

use App\EQP\Repositories\EquipmentRepository;
use App\EQP\Validators\EquipmentValidator;

class EquipmentController extends ConfigController
{
    protected function getRepository() {
        return new EquipmentRepository();
    }

    protected function getValidator() {
        return new EquipmentValidator();
    }
}
