<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
 
use App\Models\CargoType;
use Faker\Generator as Faker;

$factory->define(CargoType::class, function (Faker $faker) {

    $cargoTypes = [
        'Carga Geral',
        'Carga a Granel',
        'Carga Neogranel',
        'Carga Frigorificada',
        'Carga Perigosa',
    ];
    
    return [
        'name' => $cargoTypes[array_rand($cargoTypes)],
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
