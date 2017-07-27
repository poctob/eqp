<?php

$factory->define(App\EQP\Models\EquipmentConfig::class, function (Faker\Generator $faker) {

    return [
        'key' => str_random(10),
        'value' => str_random(25)
    ];
});