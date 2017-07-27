<?php

namespace Tests\Unit\EQP\Validators;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\EQP\Models\EquipmentCategory;
use App\EQP\Validators\EquipmentCategoryValidator;

class EquipmentCategoryValidatorTest extends ValidatorTestBase
{
    protected function makeEntity() {

        return factory(EquipmentCategory::class)->make();
    }

    protected function makeValidator() {

        return new EquipmentCategoryValidator();
    }
    
    public function testRunAllTests()
    {
        $this->ifEntityIsNullErrorIsPresent();
        $this->ifFieldIsEmptyErrorIsPresent('name');
        $this->ifFieldIsNullErrorIsPresent('ispublic');
        $this->ifAllVariablesAreGoodNoErrorsArePresent();
    }
}

