<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;


class UsersTest extends TestCase
{
    public function testCanSeeUserPage(){
        // $user = factory(App\User::class)->create();
        $user = factory(User::class)->create();
   

        $response = $this->get($user->name);
        $response->assertSee($user->name);
    }
}
