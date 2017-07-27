<?php

$factory->define(App\EQP\Models\EquipmentCategory::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'ispublic' => true,
        'name' => str_random(10),
        'description' => str_random(25),
        'notes' => str_random(100)
    ];
});