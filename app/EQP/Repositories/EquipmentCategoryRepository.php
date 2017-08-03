<?php

namespace App\EQP\Repositories;
use App\EQP\Models\EquipmentCategory;

class EquipmentCategoryRepository extends Repository
{
	protected function getEntityName() {

		return 'App\EQP\Models\EquipmentCategory';
	}

	protected function createEntityFromArray($data) {

		$entity = new EquipmentCategory();
		$entity->ispublic = $data['ispublic'];
		$entity->name = $data['name'];
		$entity->description = $data['description'];
		$entity->notes = $data['notes'];

		return $entity;
	}

	protected function updateEntityFromArray(&$entity, $data) {
		
		$entity->ispublic = $data['ispublic'];
		$entity->name = $data['name'];
		$entity->description = $data['description'];
		$entity->notes = $data['notes'];
	}
}
