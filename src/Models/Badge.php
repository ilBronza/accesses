<?php

namespace IlBronza\Accesses\Models;

use Carbon\Carbon;
use IlBronza\CRUD\Models\BaseModel;
use IlBronza\CRUD\Traits\Model\CRUDUseUuidTrait;
use IlBronza\CRUD\Traits\Model\PackagedModelsTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Badge extends BaseModel
{
	use CRUDUseUuidTrait;
	use PackagedModelsTrait;

	static $packageConfigPrefix = 'accesses';
	static $modelConfigPrefix = 'badge';
	static $deletingRelationships = ['assignments'];

	protected $keyType = 'string';

	protected $casts = [
		'active' => 'boolean'
	];

	public function assignments() : HasMany
	{
		return $this->hasMany(BadgeAssignment::gpc());
	}

	public function accessLogs() : HasMany
	{
		return $this->hasMany(AccessLog::gpc());
	}

	public function getName() : ? string
	{
		return $this->code;
	}

	public function getDescription() : ? string
	{
		return $this->notes;
	}

	/**
	 * L'assegnazione valida a un certo istante: e' l'unico modo corretto
	 * di attribuire un accesso, perche' una tessera puo' essere riassegnata.
	 */
	public function getAssignmentAt(Carbon $moment) : ? BadgeAssignment
	{
		if($this->relationLoaded('assignments'))
			return $this->assignments->first(fn(BadgeAssignment $assignment) => $assignment->isValidAt($moment));

		return $this->assignments()->validAt($moment)->first();
	}

	public function getCurrentAssignment() : ? BadgeAssignment
	{
		return $this->getAssignmentAt(Carbon::now());
	}

	public function getHolderAt(Carbon $moment) : ? Model
	{
		if(! $assignment = $this->getAssignmentAt($moment))
			return null;

		return $assignment->getHolder();
	}

	public function getCurrentHolder() : ? Model
	{
		return $this->getHolderAt(Carbon::now());
	}

	public function getCurrentHolderName() : ? string
	{
		if(! $holder = $this->getCurrentHolder())
			return null;

		return $holder->getName();
	}
}
