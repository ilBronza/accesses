<?php

namespace IlBronza\Accesses\Http\Controllers\BadgeAssignments;

use IlBronza\CRUD\Traits\CRUDDeleteTrait;

class BadgeAssignmentDestroyController extends BadgeAssignmentCRUD
{
	use CRUDDeleteTrait;

	public $allowedMethods = ['destroy'];

	public function destroy($badgeAssignment)
	{
		$badgeAssignment = $this->findModel($badgeAssignment);

		return $this->_destroy($badgeAssignment);
	}
}
