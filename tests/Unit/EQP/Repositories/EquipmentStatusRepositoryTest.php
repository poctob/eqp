<?php

namespace Tests\Unit\EQP\Repositories;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\EQP\Models\EquipmentStatus;
use App\EQP\Repositories\EquipmentStatusRepository;

class EquipmentStatusRepositoryTest extends RepositoryTestBase 
{

    
    protected function createModel() {
        return factory(EquipmentStatus::class)->create();
    }

    protected function makeRepository() {
        return new EquipmentStatusRepository();
   }
   
    protected function changeModel(&$model) {
        $model->name = str_random(10);
        return 'name';
    }

    public function testRunAllTestsForEquipmentStatusRepository()
    {
        $this->getAll(); 
        $this->getById();
        $this->save();
        $this->saveFromArray();
        $this->updateFromArray();
        $this->deleteEntity();
    }
}
