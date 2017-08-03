<?php

namespace Tests\Feature\EQP\Controllers;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\EQP\Models\EquipmentConfig;

class EquipmentConfigurationController extends ControllerTestBase
{
    protected function createModel() {
        return factory(EquipmentConfig::class)->create();
    }

    protected function getURL() {
        return 'api/config';
    }
    
    public function testAll()
    {
        $this->store();
        $this->show();
        $this->index();
        $this->update();
        $this->destroy();
    }
}
