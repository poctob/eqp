<?php

namespace Tests\Feature\EQP\Controllers;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

abstract class ControllerTestBase extends TestCase
{
    use DatabaseTransactions;

    abstract protected function createModel();
    abstract protected function getURL();
    
    public function store()
    {
        $model = $this->createModel();
        unset($model->id);

        $response = $this->json('POST', $this->getURL(), $model->attributesToArray());

        $response->assertStatus(200)->assertJSON($model->attributesToArray());
    }


    public function index() {

        $this->createModel();

        $response = $this->get($this->getURL());
        $response->assertStatus(200);
        $content = json_decode($response->content());

        $this->assertGreaterThan(0, $content);
        $this->assertGreaterThan(0, $content[0]->id);
    }

   
    public function show() {

        $model =  $this->createModel();

        $response = $this->get($this->getURL() . '/' . $model->id);
        $response->assertStatus(200);

        $content = json_decode($response->content());

        $this->assertEquals($model->id, $content->id);

        return $content;
    }

  
    public function update() {

        $model =  $this->createModel();

        $response = $this->json('PUT', $this->getURL() . '/' . $model->id , $model->attributesToArray());
        $response->assertStatus(200);

        $content = json_decode($response->content());

        $this->assertEquals($model->id, $content->id);

        return $content;
    }

    public function destroy() {

        $model =  $this->createModel();

        $response = $this->json('DELETE', $this->getURL() . '/' . $model->id);
        $response->assertStatus(200);

        $response = $this->get($this->getURL() . '/' . $model->id);

        $this->assertEquals('' , $response->content());
    }
}
