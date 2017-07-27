<?php

namespace Tests\Unit\EQP\Validators;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\EQP\Models\Equipment;
use App\EQP\Validators\EquipmentValidator;

class EquipmentValidatorTest extends ValidatorTestBase
{
    protected function makeEntity() {

        return factory(Equipment::class)->make();
    }

    protected function makeValidator() {

        return new EquipmentValidator();
    }
    
    public function testRunAllTests()
    {
        $this->ifEntityIsNullErrorIsPresent();
        $this->ifFieldIsNullErrorIsPresent('category_id');
        $this->ifFieldIsNonNumericErrorIsPresent('category_id');
        $this->ifFieldIsNullErrorIsPresent('status_id');
        $this->ifFieldIsNonNumericErrorIsPresent('status_id');
        $this->ifFieldIsNullErrorIsPresent('is_published');
        $this->ifFieldIsNullErrorIsPresent('is_active');
        $this->ifFieldIsNullErrorIsPresent('user_assigned_id');
        $this->ifAllVariablesAreGoodNoErrorsArePresent();
    }
}

