<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Transport;
use App\Models\TransportType;
use Faker\Generator as Faker;

$factory->define(Transport::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'brand' => $faker->word,
        'color' => $faker->word,
        'plate' => $faker->word,
        'transport_type_id' => TransportType::all()->random(),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
