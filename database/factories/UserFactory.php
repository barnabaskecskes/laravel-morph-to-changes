<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function(Faker $faker) {
    return [
        'name' => $faker->name,
    ];
});

$factory->state(App\User::class, 'airline', [
    'organisation_id' => function() {
        return factory(App\Airline::class)->create()->id;
    },
    'organisation_type' => App\Airline::class,
]);

$factory->state(App\User::class, 'vendor', [
    'organisation_id' => function() {
        return factory(App\Vendor::class)->create()->id;
    },
    'organisation_type' => App\Vendor::class,
]);
