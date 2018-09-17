<?php

use Faker\Generator as Faker;

$factory->define(App\AirlineApplication::class, function(Faker $faker) {
    return [
        'name' => ucwords(implode('', $faker->words(2))),
        'type' => $faker->randomElement([
            \App\Enums\ApplicationType::IN_HOUSE,
            \App\Enums\ApplicationType::COMMERCIAL,
        ]),
    ];
});
