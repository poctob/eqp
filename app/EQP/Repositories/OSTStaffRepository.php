<?php

namespace App\EQP\Repositories;
use App\EQP\Models\OSTStaff;

class OSTStaffRepository extends Repository
{
	protected function getEntityName() {

		return 'App\EQP\Models\OSTStaff';
	}

	protected function createEntityFromArray($data) {

		return null;
	}

	protected function updateEntityFromArray(&$entity, $data) {
		
		return null;
	}
}
