<?php

namespace Tests\Feature\API\Client\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ClientAuthTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function client_can_register()
    {
        $response = $this->post('api/client/register', [
            'name' => 'name',
            'phone' => '0114949901',
            'country' => 'sudan',
            'role' => config('constants.roles.1'),
            'identity_no' => '114240491',
        ]);
        $response->assertCreated();

        $this->assertDatabaseHas('clients', [
            'name' => 'name',
            'phone' => '0114949901',
            'country' => 'sudan',
            'role' => config('constants.roles.1'),
            'identity_no' => '114240491',
        ]);
    }
}