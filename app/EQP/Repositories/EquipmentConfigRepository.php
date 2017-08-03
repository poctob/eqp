<?php

namespace App\EQP\Repositories;
use App\EQP\Models\EquipmentConfig;

class EquipmentConfigRepository extends Repository
{
    protected function getEntityName()
    {
        return 'App\EQP\Models\EquipmentConfig';
    }

    protected function createEntityFromArray($data)
    {

        $entity = new EquipmentConfig();
        $entity->key = $data['key'];
        $entity->value = $data['value'];

        return $entity;
    }

    protected function updateEntityFromArray(&$entity, $data)
    {
        $entity->key = $data['key'];
        $entity->value = $data['value'];
    }
}