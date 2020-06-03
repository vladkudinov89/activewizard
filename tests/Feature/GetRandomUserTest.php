<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class GetRandomUserTest extends TestCase
{
    public function test_get_random_user()
    {
        $result = Http::get('https://randomuser.me/api/?results=10&gender=male')
            ->json();

        $this->assertCount(10 , $result['results']);
    }

}
