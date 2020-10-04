<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Services\Message;
use App\Models\User;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->artisan('db:seed');
    }

    public function test_should_be_able_to_login()
    {
        $user     = User::first();

        $this->post('/api/account/login', [
            'email'    => $user->email,
            'password' => 'secret'
        ])
        ->assertStatus(200)
        ->assertJsonStructure([
            'token', 'status'
        ]);
    }

    public function test_should_return_email_error()
    {
        $response = $this->post('/api/account/login', [
            'password' => 'secret'
        ])
        ->assertStatus(400);

        $erroEmail = $response->decodeResponseJson()['message']['email'];
        $this->assertEquals($erroEmail, ['O email é obrigatório.']);
    }

    public function test_should_return_password_error()
    {
        $user     = User::first();

        $response = $this->post('/api/account/login', [
            'email' => $user->email
        ])
        ->assertStatus(400);

        $erroPassword = $response->decodeResponseJson()['message']['password'];
        $this->assertEquals($erroPassword, ['O password é obrigatório.']);
    }

    public function test_should_return_password_wrong_error()
    {
        $user     = User::first();

        $response = $this->post('/api/account/login', [
            'email'    => $user->email,
            'password' => '1234123131'
        ])
        ->assertStatus(401);

        $erroPassword = $response->decodeResponseJson()['message'];
        $this->assertEquals($erroPassword, 'E-mail e/ou senha incorretos.');
    }

    public function test_logout()
    {
        $user     = User::first();
        $token    = JWTAuth::fromUser($user);

        $response = $this->post('/api/account/logout?token='.$token, [])
                         ->assertStatus(200);

        $this->assertEquals($response['message'], Message::logoutAccount());
    }
}
