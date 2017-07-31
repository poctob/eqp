<?php

namespace App\EQP\Repositories;
use App\EQP\Models\EquipmentCategory;

class EquipmentCategoryRepository extends Repository
{
	protected function getEntityName() {

		return 'App\EQP\Models\EquipmentCategory';
	}

	protected function createEntityFromJSON($json) {
	
		$object = (array)json_decode($json);

		$entity = new EquipmentCategory();
		$entity->ispublic = $object['ispublic'];
		$entity->name = $object['name'];
		$entity->description = $object['description'];
		$entity->notes = $object['notes'];

		return $entity;
	}

	protected function updateEntityFromJSON(&$entity, $json) {

		$object = (array)json_decode($json);
		
		$entity->ispublic = $object['ispublic'];
		$entity->name = $object['name'];
		$entity->description = $object['description'];
		$entity->notes = $object['notes'];
	}
}
