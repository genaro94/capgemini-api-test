<?php

namespace Tests\Feature\Account;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Services\Message;
use App\Models\Account;
use App\Models\User;
use Tests\TestCase;

class WithdrawTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->artisan('db:seed');
    }

    public function test_withdraws_with_balance()
    {
        $user     = User::first();
        $token    = JWTAuth::fromUser($user);
        $response = $this->post('/api/withdraws?token='.$token, [
            'value' => 10.00
        ])
        ->assertStatus(200);

        $this->assertEquals($response['message'], Message::successWithdraw());
    }

    public function test_value_is_required()
    {
        $user     = User::first();
        $token    = JWTAuth::fromUser($user);
        $response = $this->post('/api/withdraws?token='.$token, [])
                         ->assertStatus(400);

        $requiredValue = $response->decodeResponseJson()['message']['value'];
        $this->assertEquals($requiredValue, ['O value é obrigatório.']);
    }

    public function test_value_unavailable_for_withdrawal()
    {
        $user     = User::first();
        $token    = JWTAuth::fromUser($user);
        $response = $this->post('/api/withdraws?token='.$token, [
            'value'  => 10000000.00
        ])
        ->assertStatus(400);

        $this->assertEquals($response['message'], Message::insufficientAmountForWithdraw());
    }
}
