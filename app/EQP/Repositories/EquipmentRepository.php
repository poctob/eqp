<?php

namespace App\EQP\Repositories;
use App\EQP\Models\Equipment;

class EquipmentRepository extends Repository
{
	protected function getEntityName() {

		return 'App\EQP\Models\Equipment';
	}

	protected function createEntityFromArray($data) {

		$entity = new Equipment();
		$entity->category_id = $data['category_id'];
		$entity->status_id = $data['status_id'];
		$entity->is_published = $data['is_published'];
		$entity->is_active = $data['is_active'];
		$entity->user_assigned_id = $data['user_assigned_id'];

		return $entity;
	}

	protected function updateEntityFromArray(&$entity, $data) {

		$entity->category_id = $data['category_id'];
		$entity->status_id = $data['status_id'];
		$entity->is_published = $data['is_published'];
		$entity->is_active = $data['is_active'];
		$entity->user_assigned_id = $data['user_assigned_id'];
	}
}
