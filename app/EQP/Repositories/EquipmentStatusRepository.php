<?php

namespace App\EQP\Repositories;

use App\EQP\Models\EquipmentStatus;

class EquipmentStatusRepository extends Repository
{
	protected function getEntityName() {

		return 'App\EQP\Models\EquipmentStatus';
	}

	protected function createEntityFromJSON($json) {

		$entity = new EquipmentStatus();
		$entity->name = $json['name'];
		$entity->description = $json['description'];
		$entity->image_path = $json['image_path'];
		$entity->color = $json['color'];
		$entity->is_default = $json['is_default'];

		return $entity;
	}

	protected function updateEntityFromJSON(&$entity, $json) {

		$entity->name = $json['name'];
		$entity->description = $json['description'];
		$entity->image_path = $json['image_path'];
		$entity->color = $json['color'];
		$entity->is_default = $json['is_default'];
	}
}
