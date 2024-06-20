<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Training;
use Faker\Generator as Faker;

$factory->define(Training::class, function (Faker $faker) {
    return [
        'training_name' => $faker->sentence, // Generates a random sentence for training names
        'trainer_name' => $faker->name, // Uses name instead of unique()->safeEmail for trainer names
        'training_place' => $faker->city, // Uses city for training places
        'training_type' => $faker->randomElement(['Workshop', 'Course', 'Seminar']), // Customizes training types
        'training_hours' => $faker->numberBetween(1, 50), // Generates a number between 1 and 50 for hours
    ];
});
