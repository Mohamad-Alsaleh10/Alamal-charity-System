<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Employee;
use Faker\Generator as Faker;

$factory->define(Employee::class, function (Faker $faker) {
    return [
        'name' => $this->faker->name,
        'email' => $this->faker->unique()->safeEmail,
        'mobile' => $this->faker->numberBetween(1, 50),
        'position' => $this->faker->jobTitle,
        'address' => $this->faker->address,
    ];
});
