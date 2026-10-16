<?php

namespace IlBronza\Accesses\Http\Controllers;

use IlBronza\CRUD\Http\Controllers\BasePackageController;

class AccessesPackageController extends BasePackageController
{
	static $packageConfigPrefix = 'accesses';

	public function getRouteBaseNamePrefix() : ? string
	{
		return config('accesses.routePrefix');
	}

	public function setModelClass()
	{
		$this->modelClass = config("accesses.models.{$this->configModelClassName}.class");
	}
}
