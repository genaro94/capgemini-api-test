<?php

use Illuminate\Database\Seeder;
use App\Models\Account;

class AccountTableSeeder extends Seeder
{
    public function run()
    {
        $this->create();
    }

    public function create()
    {
        factory(Account::class, 50)->create();
    }
}
