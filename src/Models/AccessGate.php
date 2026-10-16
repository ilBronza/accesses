<?php

namespace IlBronza\Accesses\Models;

use IlBronza\CRUD\Models\BaseModel;
use IlBronza\CRUD\Traits\Model\CRUDUseUuidTrait;
use IlBronza\CRUD\Traits\Model\PackagedModelsTrait;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AccessGate extends BaseModel
{
	use CRUDUseUuidTrait;
	use PackagedModelsTrait;

	static $packageConfigPrefix = 'accesses';
	static $modelConfigPrefix = 'accessGate';
	static $deletingRelationships = [];

	protected $keyType = 'string';

	public function accessLogs() : HasMany
	{
		return $this->hasMany(AccessLog::gpc());
	}

	public function getName() : ? string
	{
		return $this->name;
	}

	public function getDescription() : ? string
	{
		return $this->description;
	}
}
