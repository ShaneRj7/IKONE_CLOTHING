<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Admin;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;

class AdminTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_admin_can_login_with_correct_credentials()
    {
        // Arrange: Create an admin user
        $admin = Admin::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'), // Hash the password
        ]);

        // Act: Attempt to login with correct credentials
        $response = $this->post('/admin/login', [
            'email' => 'admin@example.com',
            'password' => 'password',
        ]);

        // Assert: Check if login was successful and admin is authenticated
        $response->assertStatus(302); // Assuming redirect on successful login
        $this->assertAuthenticatedAs($admin, 'admin'); // Check admin guard
    }

    /** @test */
    public function an_admin_cannot_login_with_incorrect_credentials()
    {
        // Arrange: Create an admin user
        $admin = Admin::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'), // Hash the password
        ]);

        // Act: Attempt to login with incorrect credentials
        $response = $this->post('/admin/login', [
            'email' => 'admin@example.com',
            'password' => 'wrongpassword',
        ]);

        // Assert: Check if login was unsuccessful and admin is not authenticated
        $response->assertStatus(302); // Assuming redirect on failed login
        $this->assertGuest('admin'); // Check admin guard
    }


}
