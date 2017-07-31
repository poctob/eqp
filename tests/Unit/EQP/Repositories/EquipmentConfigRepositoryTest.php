<?php

namespace Tests\Unit\EQP\Repositories;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\EQP\Models\EquipmentConfig;
use App\EQP\Repositories\EquipmentConfigRepository;

class EquipmentConfigRepositoryTest extends RepositoryTestBase 
{

    
    protected function createModel() {
        return factory(EquipmentConfig::class)->create();
    }

    protected function makeRepository() {
        return new EquipmentConfigRepository();
   }
   
    protected function changeModel(&$model) {
        $model->key = str_random(10);
        return 'key';
    }

    public function testRunAllTestsForEquipmentConfigRepository()
    {
        $this->getAll(); 
        $this->getById();
        $this->save();
        $this->saveFromJSON();
        $this->updateFromJSON();
        $this->deleteEntity();
    }
}
