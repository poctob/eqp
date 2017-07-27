<?php

namespace Tests\Unit\EQP\Models;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\EQP\Models\EquipmentTicket;

class EquipmentTicketModelTest extends TestCase
{
    use DatabaseTransactions;

    public function testTableExistanceAndStructuralIntegrity()
    {
        $model = factory(EquipmentTicket::class)->create();

        $this->assertDatabaseHas('equipment_tickets', [
            'id' => $model->id
        ]);
    }
}
