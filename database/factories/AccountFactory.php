<?php

use Faker\Generator as Faker;
use App\Models\Account;

$factory->define(Account::class, function (Faker $faker) {
    return [
        'user_id'        => $this->faker->numberBetween(2, 12),
        'type'           => $this->faker->numberBetween(1, 1),
        'number'         => $this->faker->numberBetween(100000, 999999),
        'agency'         => $this->faker->numberBetween(10000, 99999),
        'value'          => $this->faker->numberBetween(100, 1000)
    ];
});
