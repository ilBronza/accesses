<?php

namespace IlBronza\Accesses;

use IlBronza\CRUD\Providers\RouterProvider\RoutedObjectInterface;
use IlBronza\CRUD\Traits\IlBronzaPackages\IlBronzaPackagesTrait;

class Accesses implements RoutedObjectInterface
{
	use IlBronzaPackagesTrait;

	static $packageConfigPrefix = 'accesses';

	public function manageMenuButtons()
	{
		if(! $menu = app('menu'))
			return;

		$settingsButton = $menu->provideSettingsButton();

		$accessesButton = $menu->createButton([
			'name' => 'accessesManager',
			'icon' => 'id-card',
			'text' => 'accesses::accesses.manager',
			'children' => [
				[
					'name' => 'badges.index',
					'icon' => 'id-card',
					'text' => 'accesses::badges.list',
					'href' => $this->route('badges.index')
				],
				[
					'name' => 'badgeAssignments.index',
					'icon' => 'user-lock',
					'text' => 'accesses::badgeAssignments.list',
					'href' => $this->route('badgeAssignments.index')
				],
				[
					'name' => 'accessGates.index',
					'icon' => 'door-open',
					'text' => 'accesses::accessGates.list',
					'href' => $this->route('accessGates.index')
				],
				[
					'name' => 'accessLogs.index',
					'icon' => 'clock-rotate-left',
					'text' => 'accesses::accessLogs.list',
					'href' => $this->route('accessLogs.index')
				]
			]
		]);

		$settingsButton->addChild($accessesButton);
	}
}
