<?php
namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

abstract class CrudTest extends TestCase
{

    public function createModel()
    {
        if($this->states)
        {
            return factory($this->model)->states($this->states)->create();
        }

        return factory($this->model)->create();
    }

    public function testIndex()
    {
        $response = $this->json('GET', "api/{$this->endpoint}");
        $response->assertStatus(200);
    }

    public function testShow()
    {
        $entity = $this->createModel();

        $response = $this->json('GET', "api/{$this->endpoint}/{$entity->id}");

        $entity->delete();

        $response->assertStatus(200)->assertJson([
           'data' => true
        ]);
    }

    public function testDestroy()
    {
        $entity = $this->createModel();
        $response = $this->json('DELETE', "api/{$this->endpoint}/{$entity->id}");
        $response->assertStatus(204);
    }


    public function testStore()
    {
        $entity = $this->createModel()->toArray();

        $response = $this->json('POST', "api/{$this->endpoint}/", $entity);
        $this->model::destroy($entity['id']);

        $response->assertStatus(201)->assertJson([
            'data' => true
        ]);
    }

     public function testUpdate()
    {
        $entity = $this->createModel();
        $data = $this->createModel()->toArray();

        $response = $this->json('PUT',  "api/{$this->endpoint}/{$entity->id}", $data);

        ($this->model)::destroy($entity['id']);

        $response->assertStatus(200)->assertJson(['data' => true]);
    }

}
