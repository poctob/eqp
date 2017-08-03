<?php

namespace App\Http\Controllers;

use App\EQP\Repositories\EquipmentCategoryRepository;
use App\EQP\Validators\EquipmentCategoryValidator;

class EquipmentCategoryController extends ConfigController
{
    protected function getRepository() {
        return new EquipmentCategoryRepository();
    }

    protected function getValidator() {
        return new EquipmentCategoryValidator();
    }
}
