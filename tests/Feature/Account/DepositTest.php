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

    public function test_number_is_required()
    {
        $user     = User::first();
        $account  = Account::whereUserId($user->id)->first();
        $token    = JWTAuth::fromUser($user);
        $response = $this->post('/api/deposits?token='.$token, [
            'agency'       => $account->agency,
            'number'       => null,
            'name'         => $user->name,
            'cpf'          => $user->cpf,
            'value'        => 100.00,
        ])
        ->assertStatus(400);

        $requiredNumber = $response->decodeResponseJson()['message']['number'];
        $this->assertEquals($requiredNumber, ['O number é obrigatório.']);
    }

    public function test_name_is_required()
    {
        $user     = User::first();
        $account  = Account::whereUserId($user->id)->first();
        $token    = JWTAuth::fromUser($user);
        $response = $this->post('/api/deposits?token='.$token, [
            'agency'       => $account->agency,
            'number'       => $account->number,
            'name'         => null,
            'cpf'          => $user->cpf,
            'value'        => 100.00,
        ])
        ->assertStatus(400);

        $requiredName = $response->decodeResponseJson()['message']['name'];
        $this->assertEquals($requiredName, ['O name é obrigatório.']);
    }

    public function test_cpf_is_required()
    {
        $user     = User::first();
        $account  = Account::whereUserId($user->id)->first();
        $token    = JWTAuth::fromUser($user);
        $response = $this->post('/api/deposits?token='.$token, [
            'agency'       => $account->agency,
            'number'       => $account->number,
            'name'         => $user->name,
            'cpf'          => null,
            'value'        => 100.00,
        ])
        ->assertStatus(400);

        $requiredCpf = $response->decodeResponseJson()['message']['cpf'];
        $this->assertEquals($requiredCpf, ['O cpf é obrigatório.']);
    }

    public function test_value_is_required()
    {
        $user     = User::first();
        $account  = Account::whereUserId($user->id)->first();
        $token    = JWTAuth::fromUser($user);
        $response = $this->post('/api/deposits?token='.$token, [
            'agency'       => $account->agency,
            'number'       => $account->number,
            'name'         => $user->name,
            'cpf'          => $user->cpf,
            'value'        => null,
        ])
        ->assertStatus(400);

        $requiredValue = $response->decodeResponseJson()['message']['value'];
        $this->assertEquals($requiredValue, ['O value é obrigatório.']);
    }

    public function test_non_account_exist()
    {
        $user     = User::first();
        $account  = Account::whereUserId($user->id)->first();
        $token    = JWTAuth::fromUser($user);
        $response = $this->post('/api/deposits?token='.$token, [
            'agency'       => 123,
            'number'       => $account->number,
            'name'         => $user->name,
            'cpf'          => $user->cpf,
            'value'        => 100.00,
        ])
        ->assertStatus(400);

        $this->assertEquals($response['message'], Message::nonAccountExist());
    }
}
