<?php

namespace IlBronza\Accesses\Models;

use Carbon\Carbon;
use IlBronza\CRUD\Models\BaseModel;
use IlBronza\CRUD\Traits\Model\CRUDUseUuidTrait;
use IlBronza\CRUD\Traits\Model\PackagedModelsTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class BadgeAssignment extends BaseModel
{
	use CRUDUseUuidTrait;
	use PackagedModelsTrait;

	static $packageConfigPrefix = 'accesses';
	static $modelConfigPrefix = 'badgeAssignment';
	static $deletingRelationships = [];

	protected $keyType = 'string';

	protected $fillable = [
		'holder_type',
		'holder_id'
	];

	protected $casts = [
		'valid_from' => 'datetime',
		'valid_to' => 'datetime'
	];

	public function badge() : BelongsTo
	{
		return $this->belongsTo(Badge::gpc());
	}

	public function holder() : MorphTo
	{
		return $this->morphTo();
	}

	public function getHolder() : ? Model
	{
		return $this->holder;
	}

	public function getBadge() : Badge
	{
		return $this->badge;
	}

	/**
	 * Estremi aperti: senza valid_from vale da sempre, senza valid_to vale fino a revoca.
	 */
	public function scopeValidAt(Builder $query, Carbon $moment) : Builder
	{
		return $query->where(function (Builder $query) use ($moment)
			{
				$query->whereNull('valid_from')
					->orWhere('valid_from', '<=', $moment);
			})
			->where(function (Builder $query) use ($moment)
			{
				$query->whereNull('valid_to')
					->orWhere('valid_to', '>=', $moment);
			});
	}

	/**
	 * Gemello in memoria dello scope: serve quando le assegnazioni sono gia' caricate.
	 */
	public function isValidAt(Carbon $moment) : bool
	{
		if($this->valid_from && $this->valid_from->greaterThan($moment))
			return false;

		if($this->valid_to && $this->valid_to->lessThan($moment))
			return false;

		return true;
	}

	public function getName() : ? string
	{
		return $this->getBadge()->getName();
	}

	public function getHolderName() : ? string
	{
		if(! $holder = $this->getHolder())
			return null;

		return $holder->getName();
	}
}
