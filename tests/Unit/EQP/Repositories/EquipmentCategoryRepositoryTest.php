<?php

namespace Tests\Unit\EQP\Repositories;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\EQP\Models\EquipmentCategory;
use App\EQP\Repositories\EquipmentCategoryRepository;

class EquipmentCategoryRepositoryTest extends RepositoryTestBase 
{

    
    protected function createModel() {
        return factory(EquipmentCategory::class)->create();
    }

    protected function makeRepository() {
        return new EquipmentCategoryRepository();
   }
   
    protected function changeModel(&$model) {
        $model->name = str_random(10);
        return 'name';
    }

    public function testRunAllTestsForEquipmentCategoryRepository()
    {
        $this->getAll(); 
        $this->getById();
        $this->save();
        $this->saveFromArray();
        $this->updateFromArray();
        $this->deleteEntity();
    }
}
