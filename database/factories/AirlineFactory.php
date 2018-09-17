<?php

use Faker\Generator as Faker;

$factory->define(App\Airline::class, function(Faker $faker) {
    return [
        'name' => ucwords(implode('', $faker->words(2))),
    ];
});
