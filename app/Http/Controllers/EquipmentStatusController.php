<?php

namespace App\Http\Controllers;

use App\EQP\Repositories\EquipmentStatusRepository;
use App\EQP\Validators\EquipmentStatusValidator;

class EquipmentStatusController extends ConfigController
{
    protected function getRepository() {
        return new EquipmentStatusRepository();
    }

    protected function getValidator() {
        return new EquipmentStatusValidator();
    }
}
