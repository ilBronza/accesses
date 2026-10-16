<?php

namespace IlBronza\Accesses\Http\Controllers\Parameters\Datatables;

use IlBronza\Datatables\Providers\FieldsGroupParametersFile;

class BadgeAssignmentByHolderFieldsGroupParametersFile extends FieldsGroupParametersFile
{
	static function getFieldsGroup() : array
	{
		return [
			'translationPrefix' => 'accesses::fields',
			'fields' => [
				'mySelfPrimary' => 'primary',
				'mySelfEdit' => 'links.edit',
				'badge.code' => 'flat',
				'valid_from' => [
					'type' => 'dates.date',
					'order' => [
						'priority' => 100,
						'direction' => 'desc'
					]
				],
				'valid_to' => 'dates.date',
				'notes' => 'flat',
				'mySelfDelete' => 'links.delete'
			]
		];
	}
}
