<?php

namespace IlBronza\Accesses\Http\Controllers\AccessGates;

use IlBronza\CRUD\Traits\CRUDCreateStoreTrait;

class AccessGateCreateStoreController extends AccessGateCRUD
{
	use CRUDCreateStoreTrait;

	public $allowedMethods = ['create', 'store'];

	public function getGenericParametersFile() : ? string
	{
		return config('accesses.models.accessGate.parametersFiles.create');
	}
}
