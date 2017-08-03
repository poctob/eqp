<?php

namespace Tests\Unit\EQP\Repositories;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\EQP\Models\Equipment;
use App\EQP\Repositories\EquipmentRepository;

class EquipmentRepositoryTest extends RepositoryTestBase 
{

    
    protected function createModel() {
        return factory(Equipment::class)->create();
    }

    protected function makeRepository() {
        return new EquipmentRepository();
   }
   
    protected function changeModel(&$model) {
        $model->user_assigned_id = str_random(10);
        return 'user_assigned_id';
    }

    public function testRunAllTestsForEquipmentRepository()
    {
        $this->getAll(); 
        $this->getById();
        $this->save();
        $this->saveFromArray();
        $this->updateFromArray();
        $this->deleteEntity();
    }
}
