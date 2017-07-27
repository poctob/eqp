<?php

namespace App\EQP\Repositories;
use App\EQP\Models\Equipment;

class EquipmentRepository extends Repository
{
	protected function getEntityName() {

		return 'App\EQP\Models\Equipment';
	}

	protected function createEntityFromJSON($json) {

		$entity = new Equipment();
		$entity->category_id = $json['category_id'];
		$entity->status_id = $json['status_id'];
		$entity->is_published = $json['is_published'];
		$entity->is_active = $json['is_active'];
		$entity->user_assigned_id = $json['user_assigned_id'];

		return $entity;
	}

	protected function updateEntityFromJSON(&$entity, $json) {

		$entity->category_id = $json['category_id'];
		$entity->status_id = $json['status_id'];
		$entity->is_published = $json['is_published'];
		$entity->is_active = $json['is_active'];
		$entity->user_assigned_id = $json['user_assigned_id'];
	}
}
