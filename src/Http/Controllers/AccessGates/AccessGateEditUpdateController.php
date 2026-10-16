<?php

namespace IlBronza\Accesses\Http\Controllers\AccessGates;

use IlBronza\CRUD\Traits\CRUDEditUpdateTrait;
use Illuminate\Http\Request;

class AccessGateEditUpdateController extends AccessGateCRUD
{
	use CRUDEditUpdateTrait;

	public $allowedMethods = ['edit', 'update'];

	public function getGenericParametersFile() : ? string
	{
		return config('accesses.models.accessGate.parametersFiles.edit');
	}

	public function getEditParametersFile() : ? string
	{
		return config('accesses.models.accessGate.parametersFiles.edit');
	}

	public function getUpdateParametersFile() : ? string
	{
		return config('accesses.models.accessGate.parametersFiles.update');
	}

	public function edit(string $accessGate)
	{
		$accessGate = $this->findModel($accessGate);

		return $this->_edit($accessGate);
	}

	public function update(Request $request, $accessGate)
	{
		$accessGate = $this->findModel($accessGate);

		return $this->_update($request, $accessGate);
	}
}
