<?php

namespace Tests\Feature;

use App\Models\User;
use Faker\Calculator\Iban;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use WithFaker;

    /**
     * Test Login function
     *
     * @return void
     */
    public function testLogin()
    {
        $user = User::factory()->create();
        $this->postJson('/api/auth/login', [
            'email' => $user->email,
            'password' => 'password'
        ])->assertStatus(200)
            ->assertJsonStructure([
                'access_token',
                'token_type',
                'expires_at'
            ]);
    }

    /**
     * Test Register function
     *
     * @return void
     */
    public function testRegister()
    {
        $user = User::factory()->make();
        $this->postJson('/api/auth/register', [
            'name' => $user->name,
            'email' => $user->email,
            'password' => 'password',
        ])->assertStatus(200)
            ->assertJsonStructure([
                'access_token',
                'token_type',
                'expires_at'
            ]);

        $this->assertDatabaseHas('users', [
            'email' => $user->email
        ]);
    }
}
