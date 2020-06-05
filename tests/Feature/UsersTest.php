<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UsersTest extends TestCase
{
    use RefreshDatabase;

    public function test_get_all_users()
    {
        $users = factory(User::class , 5)->create();

        $response = $this->get('/')
            ->assertStatus(200)
            ->getOriginalContent();

        $this->assertEquals($users[0]->name , $response['users'][0]->name);
        $this->assertEquals($users[0]->email , $response['users'][0]->email);
        $this->assertEquals($users[0]->gender , $response['users'][0]->gender);
    }

}
