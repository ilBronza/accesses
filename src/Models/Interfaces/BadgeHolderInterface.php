<?php

namespace IlBronza\Accesses\Models\Interfaces;

use Illuminate\Database\Eloquent\Relations\MorphMany;

interface BadgeHolderInterface
{
	public function badgeAssignments() : MorphMany;

	public function getName() : ? string;
}
