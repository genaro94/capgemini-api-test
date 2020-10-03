<?php

use Faker\Generator as Faker;
use App\Models\AccountHistory;

$factory->define(AccountHistory::class, function (Faker $faker) {
    return [
        'account_id'         => $this->faker->numberBetween(1, 50),
        'operation_type'     => $this->faker->numberBetween(1, 3),
        'value'              => $this->faker->numberBetween(0, 100)
    ];
});
