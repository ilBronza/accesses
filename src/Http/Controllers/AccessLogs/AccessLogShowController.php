<?php

namespace IlBronza\Accesses\Http\Controllers\AccessLogs;

use IlBronza\CRUD\Traits\CRUDShowTrait;

class AccessLogShowController extends AccessLogCRUD
{
	use CRUDShowTrait;

	public $allowedMethods = ['show'];

	public function getGenericParametersFile() : ? string
	{
		return config('accesses.models.accessLog.parametersFiles.show');
	}

	public function getShowParametersFile() : ? string
	{
		return config('accesses.models.accessLog.parametersFiles.show');
	}

	public function show(string $accessLog)
	{
		$accessLog = $this->findModel($accessLog);

		return $this->_show($accessLog);
	}
}
