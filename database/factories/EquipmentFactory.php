<?php

$factory->define(App\EQP\Models\Equipment::class, function (Faker\Generator $faker) {

    return [
        'category_id' => function () {
            return factory(App\EQP\Models\EquipmentCategory::class)->create()->id;
        },
        'status_id' => function () {
            return factory(App\EQP\Models\EquipmentStatus::class)->create()->id;
        },
        'is_published' => true,
        'is_active' => true,
        'user_assigned_id' => str_random(25)
    ];
});