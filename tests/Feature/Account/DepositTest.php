<?php

namespace Tests\Feature\Account;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Services\Message;
use App\Models\Account;
use App\Models\User;
use Tests\TestCase;

class DepositTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->artisan('db:seed');
    }

    public function test_deposit()
    {
        $user     = User::first();
        $account  = Account::whereUserId($user->id)->first();
        $token    = JWTAuth::fromUser($user);
        $response = $this->post('/api/deposits?token='.$token, [
            'agency'       => $account->agency,
            'number'       => $account->number,
            'name'         => $user->name,
            'cpf'          => $user->cpf,
            'value'        => 100.00,
        ])
        ->assertStatus(200);

        $this->assertEquals($response['message'], Message::successDeposit());
    }

    public function test_agency_is_required()
    {
        $user     = User::first();
        $account  = Account::whereUserId($user->id)->first();
        $token    = JWTAuth::fromUser($user);
        $response = $this->post('/api/deposits?token='.$token, [
            'agency'       => null,
            'number'       => $account->number,
            'name'         => $user->name,
            'cpf'          => $user->cpf,
            'value'        => 100.00,
        ])
        ->assertStatus(400);

        $requiredAgency = $response->decodeResponseJson()['message']['agency'];
        $this->assertEquals($requiredAgency, ['O agency é obrigatório.']);
    }
}
