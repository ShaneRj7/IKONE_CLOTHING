<?php

namespace Tests\Feature;

use App\Models\User; // Import the User model
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test registration screen can be rendered.
     *
     * @return void
     */
    public function test_registration_screen_can_be_rendered()
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    /**
     * Test new users can register.
     *
     * @return void
     */
    public function test_new_users_can_register()
    {
        $response = $this->post('/register', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'phone' => '0774570988',
            'DOB' => '2003-01-01',
            'gender' => 'Male',
            'street' => '123 Main St',
            'city' => 'Test City',
            'country' => 'Test Country',
            'password' => 'password',
            'password_confirmation' => 'password',
            'terms' => true, // Include this if your application requires users to accept terms and conditions
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/userpage'); // Update to the actual redirect URL

        $this->assertAuthenticated();
    }

  /**
 * Test registration with invalid data.
 *
 * @return void
 */



}
