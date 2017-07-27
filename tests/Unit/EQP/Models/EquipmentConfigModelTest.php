<?php

namespace Tests\Unit\EQP\Models;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\EQP\Models\EquipmentConfig;

class EquipmentConfigModelTest extends TestCase
{
    use DatabaseTransactions;

    public function testTableExistanceAndStructuralIntegrity()
    {
        $model = factory(EquipmentConfig::class)->create();

        $this->assertDatabaseHas('equipment_configs', [
            'key' => $model->key
        ]);
    }
}
