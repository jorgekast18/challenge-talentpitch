<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function load_all_users(): void
    {
        $response = $this->get('/api/v1/users');

        $response->assertStatus(200);
    }
}
