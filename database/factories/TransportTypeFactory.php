<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\TransportType;
use Faker\Generator as Faker;

$factory->define(TransportType::class, function (Faker $faker) {

    $transportTypes = [
        'Caminhão de 3,5T a 8T',
        'Caminhão de 8T a 29T',
        'Caminhão Trator',
        'Caminhão Trator Especial',
        'Caminhonete/Furgão até 3,5T',
        'Reboque',
        'Semirreboque',
        'Bi-truck',
        'Semirreboque especial',
        'Utilitário leve (VUC)',
        'Operacional de apoio (veículo leve)'
    ];
    
    return [
        'name' => $transportTypes[array_rand($transportTypes)],
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
 