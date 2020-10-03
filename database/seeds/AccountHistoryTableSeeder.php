<?php

use Illuminate\Database\Seeder;
use App\Models\AccountHistory;

class AccountHistoryTableSeeder extends Seeder
{
    public function run()
    {
        $this->create();
    }

    public function create()
    {
        factory(AccountHistory::class, 100)->create();
    }
}
