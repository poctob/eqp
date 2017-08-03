<?php

namespace App\EQP\Repositories;

use App\EQP\Models\EquipmentStatus;

class EquipmentStatusRepository extends Repository
{
	protected function getEntityName() {

		return 'App\EQP\Models\EquipmentStatus';
	}

	protected function createEntityFromArray($data) {

		$entity = new EquipmentStatus();
		$entity->name = $data['name'];
		$entity->description = $data['description'];
		$entity->image_path = $data['image_path'];
		$entity->color = $data['color'];
		$entity->is_default = $data['is_default'];

		return $entity;
	}

	protected function updateEntityFromArray(&$entity, $data) {

		$entity->name = $data['name'];
		$entity->description = $data['description'];
		$entity->image_path = $data['image_path'];
		$entity->color = $data['color'];
		$entity->is_default = $data['is_default'];
	}
}
