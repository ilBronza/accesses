<?php

namespace IlBronza\Accesses\Http\Controllers\Parameters\Datatables;

use IlBronza\Datatables\Providers\FieldsGroupParametersFile;

class BadgeAssignmentFieldsGroupParametersFile extends FieldsGroupParametersFile
{
	static function getFieldsGroup() : array
	{
		return [
			'translationPrefix' => 'accesses::fields',
			'fields' => [
				'mySelfPrimary' => 'primary',
				'mySelfEdit' => 'links.edit',
				'badge.code' => 'flat',
				'holder' => [
					'type' => 'function',
					'function' => 'getName'
				],
				'valid_from' => [
					'type' => 'dates.date',
					'order' => [
						'priority' => 100,
						'direction' => 'desc'
					]
				],
				'valid_to' => 'dates.date',
				'mySelfDelete' => 'links.delete'
			]
		];
	}
}
