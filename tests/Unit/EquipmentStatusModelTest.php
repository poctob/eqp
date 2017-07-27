<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\EQP\Models\EquipmentStatus;

class EquipmentStatusModelTest extends TestCase
{
    use DatabaseTransactions;

    public function testTableExistanceAndStructuralIntegrity()
    {
        $model = factory(EquipmentStatus::class)->create();

        $this->assertDatabaseHas('equipment_statuses', [
            'name' => $model->name
        ]);
    }
}
