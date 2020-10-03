<?php

use Faker\Generator as Faker;
use App\Models\Account;

$factory->define(Account::class, function (Faker $faker) {
    return [
        'user_id'        => $this->faker->unique()->numberBetween(1, 50),
        'type'           => $this->faker->numberBetween(1, 3),
        'number'         => $this->faker->numberBetween(100000, 999999),
        'agency'         => $this->faker->numberBetween(10000, 99999),
        'value'          => $this->faker->numberBetween(100, 1000)
    ];
});
