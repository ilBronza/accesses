<?php

namespace IlBronza\Accesses\Models;

use IlBronza\CRUD\Models\BaseModel;
use IlBronza\CRUD\Traits\Model\CRUDUseUuidTrait;
use IlBronza\CRUD\Traits\Model\PackagedModelsTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AccessLog extends BaseModel
{
	use CRUDUseUuidTrait;
	use PackagedModelsTrait;

	static $packageConfigPrefix = 'accesses';
	static $modelConfigPrefix = 'accessLog';
	static $deletingRelationships = [];

	protected $keyType = 'string';

	protected $casts = [
		'accessed_at' => 'datetime',
		'processed_at' => 'datetime',
		'parsed_payload' => 'array'
	];

	public function badge() : BelongsTo
	{
		return $this->belongsTo(Badge::gpc());
	}

	public function accessGate() : BelongsTo
	{
		return $this->belongsTo(AccessGate::gpc());
	}

	/**
	 * Il titolare non e' salvato sulla riga: si risolve dall'assegnazione
	 * valida al momento della strisciata, cosi' una riassegnazione della
	 * tessera non riscrive gli accessi passati.
	 */
	public function getHolder() : ? Model
	{
		if(! $badge = $this->badge)
			return null;

		return $badge->getHolderAt($this->accessed_at);
	}

	public function getHolderName() : ? string
	{
		if(! $holder = $this->getHolder())
			return null;

		return $holder->getName();
	}

	public function getName() : ? string
	{
		return $this->badge_code . ' - ' . $this->accessed_at->format('d/m/Y H:i');
	}
}
