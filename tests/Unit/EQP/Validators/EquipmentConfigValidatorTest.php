<?php

namespace Tests\Unit\EQP\Validators;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\EQP\Models\EquipmentConfig;
use App\EQP\Validators\EquipmentConfigValidator;

class EquipmentConfigValidatorTest extends ValidatorTestBase
{
    protected function makeEntity() {

        return factory(EquipmentConfig::class)->make();
    }

    protected function makeValidator() {

        return new EquipmentConfigValidator();
    }

    public function testRunAllTests()
    {
        $this->ifEntityIsNullErrorIsPresent();
        $this->ifFieldIsEmptyErrorIsPresent('key');
        $this->ifAllVariablesAreGoodNoErrorsArePresent();
    }
}
