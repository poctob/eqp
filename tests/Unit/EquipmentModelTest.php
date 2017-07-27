<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\EQP\Models\Equipment;

class EquipmentModelTest extends TestCase
{
    use DatabaseTransactions;

    public function testTableExistanceAndStructuralIntegrity()
    {
        $model = factory(Equipment::class)->create();

        $this->assertDatabaseHas('equipments', [
            'id' => $model->id
        ]);
    }
}
