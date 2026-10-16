<?php

namespace IlBronza\Accesses\Http\Controllers\BadgeAssignments;

use IlBronza\CRUD\Helpers\ModelHelpers\ModelFinderHelper;
use IlBronza\CRUD\Traits\CRUDCreateStoreTrait;

class BadgeAssignmentCreateStoreController extends BadgeAssignmentCRUD
{
	use CRUDCreateStoreTrait;

	public $allowedMethods = ['createByHolder', 'store'];

	public function getGenericParametersFile() : ? string
	{
		return config('accesses.models.badgeAssignment.parametersFiles.create');
	}

	/**
	 * Il titolare e' polimorfico: la coppia classe/chiave arriva dalla rotta
	 * e diventa il parent model del form.
	 */
	public function createByHolder(string $class, string $key)
	{
		$holder = ModelFinderHelper::getByClassKey($class, $key);

		$this->setParentModel($holder);

		return $this->create();
	}

	public function associateParentModel(array $parameters) : array
	{
		$parameters['holder_type'] = $this->getParentModel()->getMorphClass();
		$parameters['holder_id'] = $this->getParentModel()->getKey();

		return $parameters;
	}
}
