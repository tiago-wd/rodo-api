<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use Faker\Generator as Faker;

$factory->define(User::class, function (Faker $faker) {

    return [
        'name' => $faker->firstname . " " . $faker->firstname,
        'email' => $faker->safeEmail,
        'email_verified_at' => $faker->date('Y-m-d H:i:s'),
        'password' => "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi",
        'activation_token' => null,
        'remember_token' => null,
        'cnh' => $faker->ein,
        'identity_number' => $faker->ein,
        'fone' => $faker->e164PhoneNumber,
        'transport_id' => null,
        'active' => true,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
