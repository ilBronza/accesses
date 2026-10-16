<?php

namespace IlBronza\Accesses\Http\Controllers\BadgeAssignments;

use IlBronza\CRUD\Traits\CRUDIndexTrait;
use IlBronza\CRUD\Traits\CRUDPlainIndexTrait;

class BadgeAssignmentIndexController extends BadgeAssignmentCRUD
{
	use CRUDPlainIndexTrait;
	use CRUDIndexTrait;

	public $allowedMethods = ['index'];

	public function getIndexFieldsArray()
	{
		return config('accesses.models.badgeAssignment.fieldsGroupsFiles.index')::getTracedFieldsGroup();
	}

	public function getIndexElements()
	{
		return $this->getModelClass()::with(['badge', 'holder'])->orderByDesc('valid_from')->get();
	}
}
