<?php

namespace tests\Feature;

use App\Models\User;
use Hash;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Str;
use Tests\TestCase;
use function PHPUnit\Framework\assertEquals;



class UserAuthenticationTest extends TestCase
{
      use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_login_user_not_found(): void {

        $response = $this->post('api/auth/login', ['email' => 'allan@mail.com', 'password' => 'Some Password']);
 
        $response->assertStatus(401);
    }

    public function test_login_user_found(): void {
        $user = User::factory()->create([
            'id' => (string)Str::uuid(),
            'email' => 'allan@mail.com',
            'password' => 'Some Password',
        ]);

        $response = $this->post('api/auth/login', [
            'email' => 'allan@mail.com',
            'password' => 'Some Password',
        ]);

        $response->assertStatus(200);
    }

    public function test_login_incorrect_password(): void {
           $user = User::factory()->create([
            'id' => (string)Str::uuid(),
            'email' => 'allan@mail.com',
            'password' => 'Some Passwor',
        ]);

        $response = $this->post('api/auth/login', [
            'email' => 'allan@mail.com',
            'password' => 'Some Password',
        ]);

        $response->assertStatus(401);
    }

    public function test_register_user(): void {

        $response = $this->post('api/auth/register', [
            'name' => 'Allan Fernandes',
            'email' => 'allan@mail.com',
            'password' => 'Some Password',
        ]);

        $response->assertStatus(200);
        $response->assertExactJson(['message' => 'User registered successfully']);

        $user = User::all()->first();
        
        assertEquals($user->name, 'Allan Fernandes');
        assertEquals($user->email, 'allan@mail.com');
        $this->assertTrue(Hash::check('Some Password', $user->password));
    }

    public function test_register_user_fails_validation(): void {
        $response = $this->post('api/auth/register', [
            'email' => 'allan2fernandes@hotmail.com',
            'password' => 'Some Password',
        ]);

        $response->assertStatus(302);

        $response = $this->post('api/auth/register', [
            'email' => 'allan2fernandes@hotmail.com',
            'password' => 'Some Password',
        ]);

        $response->assertStatus(302);

        $response = $this->post('api/auth/register', [
            'name' => 'Allan Fernandes',
            'email' => 'allan2fernandes@hotmail.com',
        ]);

        $response->assertStatus(302);
    }

    public function test_logout_success() {
        $this->post('api/auth/register', [
            'name' => 'Allan Fernandes',
            'email' => 'allan@mail.com',
            'password' => 'Some Password',
        ]);

        $login_response = $this->post('api/auth/login', [
            'email' => 'allan@mail.com',
            'password' => 'Some Password',
        ]);
        $token = $login_response->json()['token'];

        $logout_response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token
        ])->post('api/auth/logout');

        $logout_response->assertStatus(200);
    }
}