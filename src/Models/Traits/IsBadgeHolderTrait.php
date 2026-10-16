<?php

namespace IlBronza\Accesses\Models\Traits;

use Carbon\Carbon;
use IlBronza\Accesses\Facades\Accesses;
use IlBronza\Accesses\Models\Badge;
use IlBronza\Accesses\Models\BadgeAssignment;
use IlBronza\Buttons\Button;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Collection;

trait IsBadgeHolderTrait
{
	public function badgeAssignments() : MorphMany
	{
		return $this->morphMany(BadgeAssignment::gpc(), 'holder');
	}

	public function getBadgeAssignments() : Collection
	{
		if($this->relationLoaded('badgeAssignments'))
			return $this->badgeAssignments;

		return $this->badgeAssignments()->get();
	}

	public function getBadgeAssignmentAt(Carbon $moment) : ? BadgeAssignment
	{
		if($this->relationLoaded('badgeAssignments'))
			return $this->badgeAssignments->first(fn(BadgeAssignment $assignment) => $assignment->isValidAt($moment));

		return $this->badgeAssignments()->validAt($moment)->first();
	}

	public function getCurrentBadgeAssignment() : ? BadgeAssignment
	{
		return $this->getBadgeAssignmentAt(Carbon::now());
	}

	public function getCurrentBadge() : ? Badge
	{
		if(! $assignment = $this->getCurrentBadgeAssignment())
			return null;

		return $assignment->getBadge();
	}

	public function getCurrentBadgeCode() : ? string
	{
		if(! $badge = $this->getCurrentBadge())
			return null;

		return $badge->getName();
	}

	public function getAssignBadgeUrl() : string
	{
		return Accesses::getRoutedModel($this, 'badgeAssignments.createByHolder');
	}

	public function getAssignBadgeButton() : Button
	{
		return Button::create([
			'href' => $this->getAssignBadgeUrl(),
			'icon' => 'id-card',
			'text' => trans('accesses::badgeAssignments.create')
		]);
	}
}
