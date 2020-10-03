<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        $this->create();
    }

    public function create()
    {
        factory(User::class)->create([
            'name'        => 'Genaro Figueiredo',
            'email'       => 'user@support.com',
            'profile_id'  => User::SUPPORT,
        ]);

        factory(User::class, 50)->create();
    }
}
