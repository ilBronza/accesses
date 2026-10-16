<?php

namespace IlBronza\Accesses\Http\Controllers\Badges;

use IlBronza\CRUD\Traits\CRUDEditUpdateTrait;
use Illuminate\Http\Request;

class BadgeEditUpdateController extends BadgeCRUD
{
	use CRUDEditUpdateTrait;

	public $allowedMethods = ['edit', 'update'];

	public function getGenericParametersFile() : ? string
	{
		return config('accesses.models.badge.parametersFiles.edit');
	}

	public function getEditParametersFile() : ? string
	{
		return config('accesses.models.badge.parametersFiles.edit');
	}

	public function getUpdateParametersFile() : ? string
	{
		return config('accesses.models.badge.parametersFiles.update');
	}

	public function edit(string $badge)
	{
		$badge = $this->findModel($badge);

		return $this->_edit($badge);
	}

	public function update(Request $request, $badge)
	{
		$badge = $this->findModel($badge);

		return $this->_update($request, $badge);
	}
}
