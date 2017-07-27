<?php

$factory->define(App\EQP\Models\EquipmentStatus::class, function (Faker\Generator $faker) {

    return [
        'name' => str_random(10),
        'description' => str_random(25),
        'image_path' => $faker->url,
        'color' => $faker->safeColorName,
        'is_default' => true
    ];
});