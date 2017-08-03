<?php

namespace App\Http\Controllers;

use App\EQP\Repositories\EquipmentConfigRepository;
use App\EQP\Validators\EquipmentConfigValidator;

class EquipmentConfigurationController extends ConfigController
{
    protected function getRepository() {
        return new EquipmentConfigRepository();
    }

    protected function getValidator() {
        return new EquipmentConfigValidator();
    }
}
