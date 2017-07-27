<?php

$factory->define(App\EQP\Models\EquipmentTicket::class, function (Faker\Generator $faker) {

    return [
         'equipment_id' => function () {
            return factory(App\EQP\Models\Equipment::class)->create()->id;
        },
        'ticket_id' => random_int(0, 100)
    ];
});