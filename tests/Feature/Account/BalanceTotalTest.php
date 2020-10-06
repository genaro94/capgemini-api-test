<?php

namespace Tests\Feature\Account;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Services\Message;
use App\Models\User;
use Tests\TestCase;

class BalanceTotalTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->artisan('db:seed');
    }

    public function test_get_total_balance_account()
    {
        $user     = User::first();
        $token    = JWTAuth::fromUser($user);
        $response = $this->get('/api/balances?token='.$token)
                         ->assertStatus(200);

        $this->assertEquals($response['balance'], $user->getTotalBalanceAccount());
    }

    public function test_get_total_balance_account_non_token()
    {
        $user     = User::first();
        $response = $this->get('/api/balances?token=')
                         ->assertStatus(400);

        $this->assertEquals($response['message'], Message::jwtException());
    }
}
