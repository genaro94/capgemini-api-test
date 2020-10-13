<?php

use Illuminate\Database\Seeder;
use App\Models\Account;
use App\Models\User;

class AccountTableSeeder extends Seeder
{
    public function run()
    {
        $this->createUserAccounDefault();
        $this->createAccountByUser();
    }

    public function createUserAccounDefault()
    {
        $user = factory(User::class)->create([
            'name'        => 'Genaro Figueiredo',
            'email'       => 'user@email.com',
            'profile_id'  => User::CLIENT,
            'cpf'         => 12345678901
        ]);

        factory(Account::class)->create([
            'user_id' => $user->id,
            'number'  => 123456,
            'agency'  => 12345
        ]);
    }

    public function createAccountByUser()
    {
        factory(User::class, 20)->create()->each(function($user){
            $user->accounts()->save(factory(Account::class)->make());
        });
    }
}
