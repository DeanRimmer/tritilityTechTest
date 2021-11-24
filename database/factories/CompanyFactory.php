<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Company;
use Faker\Generator as Faker;

$factory->define(Company::class, function (Faker $faker) {
    return [
        'name' => $faker->firstName(),
        'email' => $faker->unique()->safeEmail,
        'logo' => $faker->randomElement(['/images/logo1.png', '/images/logo2.png', '/images/logo3.png', '/images/logo4.png', '/images/logo5.png']),
        'website' => $faker->url(),
    ];
});