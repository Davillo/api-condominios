<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CondominiumControllerTest extends CrudTest
{
    /**
     * The model to use when creating dummy data
     *
     * @var class
     */
    protected $model = \App\Models\Condominium::class;
    /**
     * The endpoint to query in the API
     * e.g = /api/v1/<endpoint>
     *
     * @var string
     */
    protected $endpoint = 'condominium';
    /**
     * Any additional "states" to add to factory
     *
     * @var string
     */
    protected $states = 'condominium';
}
