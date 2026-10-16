<?php

namespace IlBronza\Accesses\Http\Controllers\AccessGates;

use IlBronza\CRUD\Traits\CRUDDeleteTrait;

class AccessGateDestroyController extends AccessGateCRUD
{
	use CRUDDeleteTrait;

	public $allowedMethods = ['destroy'];

	public function destroy($accessGate)
	{
		$accessGate = $this->findModel($accessGate);

		return $this->_destroy($accessGate);
	}
}
