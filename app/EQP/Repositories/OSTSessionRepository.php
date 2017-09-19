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

	public function getValidByUserId($id) {
		$now =date("Y-m-d H:i:s");

		return $this->getEntityName()::where
			([
				['user_id', '=', $id],
				['session_expire', '>', $now],
			])->first();
			
	}
}
