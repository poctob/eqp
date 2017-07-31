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
		$object = (array)json_decode($json);

        $entity = new EquipmentConfig();
        $entity->key = $object['key'];
        $entity->value = $object['value'];

        return $entity;
    }

    protected function updateEntityFromJSON(&$entity, $json)
    {
        $object = (array)json_decode($json);

        $entity->key = $object['key'];
        $entity->value = $object['value'];
    }
}