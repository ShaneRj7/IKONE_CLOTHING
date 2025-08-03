<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;

class LogoutTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test user logout.
     *
     * @return void
     */
    public function test_user_can_logout()
    {
        // Create a user
        $user = User::factory()->create();

        // Acting as the authenticated user
        $response = $this->actingAs($user)->post('/logout');

        // Assert that the user is redirected after logout
        $response->assertStatus(302);
        $response->assertRedirect('/');

        // Assert that the user is logged out
        $this->assertGuest();
    }
}
