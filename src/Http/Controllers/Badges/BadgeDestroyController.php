<?php

namespace IlBronza\Accesses\Http\Controllers\Badges;

use IlBronza\CRUD\Traits\CRUDDeleteTrait;

class BadgeDestroyController extends BadgeCRUD
{
	use CRUDDeleteTrait;

	public $allowedMethods = ['destroy'];

	public function destroy($badge)
	{
		$badge = $this->findModel($badge);

		return $this->_destroy($badge);
	}
}
