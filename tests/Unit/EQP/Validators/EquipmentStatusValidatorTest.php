<?php

namespace Tests\Unit\EQP\validators;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\EQP\Models\EquipmentStatus;
use App\EQP\Validators\EquipmentStatusValidator;

class EquipmentStatusValidatorTest extends ValidatorTestBase
{
    protected function makeEntity() {

        return factory(EquipmentStatus::class)->make();
    }

    protected function makeValidator() {

        return new EquipmentStatusValidator();
    }
    
    public function testRunAllTests()
    {
        $this->ifEntityIsNullErrorIsPresent();
        $this->ifFieldIsEmptyErrorIsPresent('name');
        $this->ifFieldIsNullErrorIsPresent('image_path');
        $this->ifFieldIsNullErrorIsPresent('description');
        $this->ifFieldIsEmptyErrorIsPresent('color');
        $this->ifFieldIsNullErrorIsPresent('is_default');
        $this->ifAllVariablesAreGoodNoErrorsArePresent();
    }
}

