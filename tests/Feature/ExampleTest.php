<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    // public function testBasicTest()
    // {
        //preparacion
        //accion
        //verificacion


        // $response = $this->get('/');

        // $response->assertStatus(500);
        // $response->assertSee('Laratter');
    // }
    public function testCanSearchForMessages(){
        $response = $this->get('/messages?quey=alice');
        $response ->assertSee('Ale en el paisss');
    }
}
