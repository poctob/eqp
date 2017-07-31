<?php

namespace App\EQP\Repositories;

use App\EQP\Models\EquipmentStatus;

class EquipmentStatusRepository extends Repository
{
	protected function getEntityName() {

		return 'App\EQP\Models\EquipmentStatus';
	}

	protected function createEntityFromJSON($json) {

		$object = (array)json_decode($json);

		$entity = new EquipmentStatus();
		$entity->name = $object['name'];
		$entity->description = $object['description'];
		$entity->image_path = $object['image_path'];
		$entity->color = $object['color'];
		$entity->is_default = $object['is_default'];

		return $entity;
	}

	protected function updateEntityFromJSON(&$entity, $json) {

		$object = (array)json_decode($json);

		$entity->name = $object['name'];
		$entity->description = $object['description'];
		$entity->image_path = $object['image_path'];
		$entity->color = $object['color'];
		$entity->is_default = $object['is_default'];
	}
}
