<?php

namespace App\EQP\Repositories;
use App\EQP\Models\EquipmentCategory;

class EquipmentCategoryRepository extends Repository
{
	protected function getEntityName() {

		return 'App\EQP\Models\EquipmentCategory';
	}

	protected function createEntityFromJSON($json) {

		$entity = new EquipmentCategory();
		$entity->ispublic = $json['ispublic'];
		$entity->name = $json['name'];
		$entity->description = $json['description'];
		$entity->notes = $json['notes'];

		return $entity;
	}

	protected function updateEntityFromJSON(&$entity, $json) {

		$entity->ispublic = $json['ispublic'];
		$entity->name = $json['name'];
		$entity->description = $json['description'];
		$entity->notes = $json['notes'];
	}
}
