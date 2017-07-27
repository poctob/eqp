<?php

namespace App\EQP\Repositories;
use App\EQP\Models\EquipmentConfig;

class EquipmentConfigRepository extends Repository
{
    protected function getEntityName()
    {
        return 'App\EQP\Models\EquipmentConfig';
    }

    protected function createEntityFromJSON($json)
    {
        $entity = new EquipmentConfig();
        $entity->key = $json['key'];
        $entity->value = $json['value'];

        return $entity;
    }

    protected function updateEntityFromJSON(&$entity, $json)
    {
        $entity->key = $json['key'];
        $entity->value = $json['value'];
    }
}