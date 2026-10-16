<?php

namespace IlBronza\Accesses\Http\Controllers\Badges;

use IlBronza\CRUD\Traits\CRUDCreateStoreTrait;

class BadgeCreateStoreController extends BadgeCRUD
{
	use CRUDCreateStoreTrait;

	public $allowedMethods = ['create', 'store'];

	public function getGenericParametersFile() : ? string
	{
		return config('accesses.models.badge.parametersFiles.create');
	}
}
