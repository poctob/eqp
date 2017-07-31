<?php

namespace App\EQP\Repositories;
use App\EQP\Models\Equipment;

class EquipmentRepository extends Repository
{
	protected function getEntityName() {

		return 'App\EQP\Models\Equipment';
	}

	protected function createEntityFromJSON($json) {

		$object = (array)json_decode($json);

		$entity = new Equipment();
		$entity->category_id = $object['category_id'];
		$entity->status_id = $object['status_id'];
		$entity->is_published = $object['is_published'];
		$entity->is_active = $object['is_active'];
		$entity->user_assigned_id = $object['user_assigned_id'];

		return $entity;
	}

	protected function updateEntityFromJSON(&$entity, $json) {

		$object = (array)json_decode($json);

		$entity->category_id = $object['category_id'];
		$entity->status_id = $object['status_id'];
		$entity->is_published = $object['is_published'];
		$entity->is_active = $object['is_active'];
		$entity->user_assigned_id = $object['user_assigned_id'];
	}
}
