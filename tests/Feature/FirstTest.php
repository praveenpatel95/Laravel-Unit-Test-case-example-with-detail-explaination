<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FirstTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_my_user()
    {
        $response = $this->get('/getUser/3')
            ->assertStatus(200)->json();
    }
}
