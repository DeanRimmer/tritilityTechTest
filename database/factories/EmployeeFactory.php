<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Employee;
use Faker\Generator as Faker;

$factory->define(Employee::class, function (Faker $faker) {
    $companies = App\Company::pluck('id')->toArray();
    return [
        'firstName' => $faker->firstName(),
        'lastName' => $faker->lastName(),
        'company_id' => $faker->randomElement($companies),
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->phoneNumber(),
        
    ];
});