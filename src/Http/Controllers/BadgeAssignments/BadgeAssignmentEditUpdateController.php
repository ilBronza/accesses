<?php

namespace IlBronza\Accesses\Http\Controllers\BadgeAssignments;

use IlBronza\CRUD\Traits\CRUDEditUpdateTrait;
use Illuminate\Http\Request;

class BadgeAssignmentEditUpdateController extends BadgeAssignmentCRUD
{
	use CRUDEditUpdateTrait;

	public $allowedMethods = ['edit', 'update'];

	public function getGenericParametersFile() : ? string
	{
		return config('accesses.models.badgeAssignment.parametersFiles.edit');
	}

	public function getEditParametersFile() : ? string
	{
		return config('accesses.models.badgeAssignment.parametersFiles.edit');
	}

	public function getUpdateParametersFile() : ? string
	{
		return config('accesses.models.badgeAssignment.parametersFiles.update');
	}

	public function edit(string $badgeAssignment)
	{
		$badgeAssignment = $this->findModel($badgeAssignment);

		return $this->_edit($badgeAssignment);
	}

	public function update(Request $request, $badgeAssignment)
	{
		$badgeAssignment = $this->findModel($badgeAssignment);

		return $this->_update($request, $badgeAssignment);
	}
}
