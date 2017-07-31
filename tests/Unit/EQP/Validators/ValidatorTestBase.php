<?php

namespace Tests\Unit\EQP\Validators;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

abstract class ValidatorTestBase extends TestCase
{
    use DatabaseTransactions;
    
    private $model;
    private $validator;

    abstract protected function makeEntity();
    abstract protected function makeValidator();

    public function setUp() {
        parent::setUp();
        
        $this->model = $this->makeEntity(); 
        $this->validator = $this->makeValidator();
    }

    protected function ifEntityIsNullErrorIsPresent()
    {
        $this->setUp();
        $this->validator->validate(null);
        $response = $this->validator->getErrors();

        $this->assertArrayHasKey('entity', $response);
        $this->assertEquals('required', $response['entity']);
    }
    
    protected function ifFieldIsEmptyErrorIsPresent($field)
    {
        $this->setUp();
        $this->model->$field = '';
        $this->validator->validate($this->model);
        $response = $this->validator->getErrors();

        $this->assertArrayHasKey($field, $response);
        $this->assertEquals('required', $response[$field]);
    }
    
    protected function ifFieldIsNullErrorIsPresent($field)
    {
        $this->setUp();
        $this->model->$field = null;
        $this->validator->validate($this->model);
        $response = $this->validator->getErrors();

        $this->assertArrayHasKey($field, $response);
        $this->assertEquals('required', $response[$field]);
    }
    
    protected function ifFieldIsNonNumericErrorIsPresent($field)
    {
        $this->setUp();
        $this->model->$field = 'abc';
        $this->validator->validate($this->model);
        $response = $this->validator->getErrors();

        $this->assertArrayHasKey($field, $response);
        $this->assertEquals('required', $response[$field]);
    }

    
    protected function ifAllVariablesAreGoodNoErrorsArePresent()
    {
        $this->setUp();
        $this->validator->validate($this->model);
        $response = $this->validator->getErrors();

        $this->assertCount(0, $response);
    }
}
