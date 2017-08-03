<?php

namespace Tests\Unit\EQP\Repositories;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\EQP\Repositories\Repository;

abstract class RepositoryTestBase extends TestCase
{
    use DatabaseTransactions;

    private $model;
    private $repository;

    protected abstract function createModel();
    protected abstract function makeRepository();
    protected abstract function changeModel(&$model);

    public function setUp() {
        parent::setUp();
        
        $this->model = $this->createModel(); 
        $this->repository = $this->makeRepository();
    }

    public function getAll() {

        $this->setUp();

        $entities = $this->repository->getAll();
        $count = count($entities);

        $this->assertTrue($count > 0);
        $element = $entities[$count - 1];

        $this->assertEquals($this->model->id, $element->id);
    }
    
    public function getById() {

        $this->setUp();

        $entity = $this->repository->getById($this->model->id);

        $this->assertEquals($this->model->id, $entity->id);
    }
    
    public function save() {

        $this->setUp();
        $id = $this->model->id;

        $fieldName = $this->changeModel($this->model);

        $result = $this->repository->save($this->model);
        $entity2 = $this->repository->getById($id);

        $this->assertTrue($result);
        $this->assertEquals($this->model->$fieldName, $entity2->$fieldName);
    }
    
    public function saveFromArray() {

        $this->setUp();
        $id = $this->model->id;

        unset($this->model->id);
        $data = $this->model->attributesToArray();

        $entity = $this->repository->saveFromArray($data);

        $this->assertEquals($id+1, $entity->id);
    }

    
    public function updateFromArray() {

        $this->setUp();
        $id = $this->model->id;
        $fieldName = $this->changeModel($this->model);

        $data = $this->model->attributesToArray();

        $result = $this->repository->updateFromArray($data, $id);
        
        $this->assertTrue($result);
        $entity2 = $this->repository->getById($id);

        $this->assertEquals($this->model->$fieldName, $entity2->$fieldName);
    }

    public function deleteEntity() {
        $this->setUp();
        $id = $this->model->id;

        $result = $this->repository->delete($id);
        $this->assertTrue($result);
        $entity2 = $this->repository->getById($id);
        $this->assertNull($entity2);
    }

}
