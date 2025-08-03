<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test successful login.
     *
     * @return void
     */
    public function test_successful_login()
    {
        // Create a user
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => bcrypt($password = 'password123'),
        ]);

        // Get the login page to generate CSRF token
        $response = $this->get('/login');
        $token = csrf_token();

        // Attempt to login
        $response = $this->post('/login', [
            '_token' => $token,
            'email' => 'test@example.com',
            'password' => $password,
        ]);

        // Assert the user is authenticated
        $response->assertStatus(302); // redirect status
        $response->assertRedirect('/userpage'); 
        $this->assertAuthenticatedAs($user);
    }

    /**
     * Test login with incorrect password.
     *
     * @return void
     */
    public function test_login_with_incorrect_password()
    {
        // Create a user
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => bcrypt('password123'),
        ]);

        // Get the login page to generate CSRF token
        $response = $this->get('/login');
        $token = csrf_token();

        // Attempt to login with incorrect password
        $response = $this->from('/login')->post('/login', [
            '_token' => $token,
            'email' => 'test@example.com',
            'password' => 'wrongpassword',
        ]);

        // Assert the user is redirected back to the login page
        $response->assertStatus(302);
        $response->assertRedirect('/login');
        $response->assertSessionHasErrors(['email']);
        $this->assertGuest();
    }

    /**
     * Test login with non-existent email.
     *
     * @return void
     */
    public function test_login_with_non_existent_email()
    {
        // Get the login page to generate CSRF token
        $response = $this->get('/login');
        $token = csrf_token();

        // Attempt to login with non-existent email
        $response = $this->from('/login')->post('/login', [
            '_token' => $token,
            'email' => 'nonexistent@example.com',
            'password' => 'password123',
        ]);

        // Assert the user is redirected back to the login page
        $response->assertStatus(302);
        $response->assertRedirect('/login');
        $response->assertSessionHasErrors(['email']);
        $this->assertGuest();
    }
}
