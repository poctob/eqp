<?php

namespace App\EQP\Repositories;
use App\EQP\Models\OSTSession;

class OSTSessionRepository extends Repository
{
	protected function getEntityName() {

		return 'App\EQP\Models\OSTSession';
	}

	protected function createEntityFromArray($data) {

		return null;
	}

	protected function updateEntityFromArray(&$entity, $data) {
		
		return null;
	}
}
