<?php

namespace Tests\Feature\EQP\Controllers;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\EQP\Models\EquipmentCategory;

class EquipmentCategoryController extends ControllerTestBase
{
    protected function createModel() {
        return factory(EquipmentCategory::class)->create();
    }

    protected function getURL() {
        return 'api/category';
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
