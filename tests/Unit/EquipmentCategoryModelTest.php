<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\EQP\Models\EquipmentCategory;

class EquipmentCategoryModelTest extends TestCase
{
    use DatabaseTransactions;

    public function testTableExistanceAndStructuralIntegrity()
    {
        $model = factory(EquipmentCategory::class)->create();

        $this->assertDatabaseHas('equipment_categories', [
            'name' => $model->name
        ]);
    }
}
