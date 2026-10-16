<?php

namespace IlBronza\Accesses\Facades;

use Illuminate\Support\Facades\Facade;

class Accesses extends Facade
{
	/**
	 * Get the registered name of the component.
	 *
	 * @return string
	 */
	protected static function getFacadeAccessor() : string
	{
		return 'accesses';
	}
}
