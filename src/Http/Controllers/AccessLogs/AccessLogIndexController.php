<?php

namespace IlBronza\Accesses\Http\Controllers\AccessLogs;

use IlBronza\CRUD\Traits\CRUDIndexTrait;
use IlBronza\CRUD\Traits\CRUDPlainIndexTrait;

class AccessLogIndexController extends AccessLogCRUD
{
	use CRUDPlainIndexTrait;
	use CRUDIndexTrait;

	public $allowedMethods = ['index'];

	public function getIndexFieldsArray()
	{
		return config('accesses.models.accessLog.fieldsGroupsFiles.index')::getTracedFieldsGroup();
	}

	public function getIndexElements()
	{
		return $this->getModelClass()::with(['accessGate', 'badge.assignments.holder'])
			->orderByDesc('accessed_at')
			->get();
	}
}
