<?php

namespace IlBronza\Accesses\Http\Controllers\Badges;

use IlBronza\CRUD\Traits\CRUDShowTrait;

class BadgeShowController extends BadgeCRUD
{
	use CRUDShowTrait;

	public $allowedMethods = ['show'];

	public function getGenericParametersFile() : ? string
	{
		return config('accesses.models.badge.parametersFiles.show');
	}

	public function getShowParametersFile() : ? string
	{
		return config('accesses.models.badge.parametersFiles.show');
	}

	public function show(string $badge)
	{
		$badge = $this->findModel($badge);

		return $this->_show($badge);
	}
}
