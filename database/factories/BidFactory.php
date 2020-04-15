<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Bid;
use App\Models\Cargo;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(Bid::class, function (Faker $faker) {

    $cargo = Cargo::all()->random();
    $user = User::all()->random();
    $driver = User::where('id', '!=', $user->id)->get()->random();
    $status = ['Negociando', 'Negado', 'Aceito', 'Em Andamento', 'Finalizado'];
    $selectedStatus = $status[array_rand($status)];
    return [
        'cargo_id' => $cargo->id,
        'user_id' => $user->id,
        'driver_id' => $driver->id,
        'bid_status' => $selectedStatus,
        'status' => $selectedStatus,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
    ];
});
