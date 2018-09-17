<?php

use Faker\Generator as Faker;

$factory->define(App\Vendor::class, function(Faker $faker) {
    return [
        'name' => ucwords(implode('', $faker->words(2))),
    ];
});
