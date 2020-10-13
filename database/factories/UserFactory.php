<?php

use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(User::class, function (Faker $faker) {
    return [
        'name'                 => $faker->name,
        'email'                => $faker->unique()->safeEmail,
        'email_verified_at'    => now(),
        'password'             => 'secret',
        'profile_id'           => $this->faker->numberBetween(1, 4),
        'cpf'                  => $this->faker->unique()->numberBetween(10000000000, 99999999999),
        'phone'                => $this->faker->numberBetween(10000000000, 99999999999),
        'remember_token'       => Str::random(10),
    ];
});
