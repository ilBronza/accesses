<?php

namespace IlBronza\Accesses\Http\Controllers\AccessGates;

use IlBronza\CRUD\Traits\CRUDIndexTrait;
use IlBronza\CRUD\Traits\CRUDPlainIndexTrait;

class AccessGateIndexController extends AccessGateCRUD
{
	use CRUDPlainIndexTrait;
	use CRUDIndexTrait;

	public $allowedMethods = ['index'];

	public function getIndexFieldsArray()
	{
		return config('accesses.models.accessGate.fieldsGroupsFiles.index')::getTracedFieldsGroup();
	}

	public function getIndexElements()
	{
		return $this->getModelClass()::orderBy('name')->get();
	}
}
