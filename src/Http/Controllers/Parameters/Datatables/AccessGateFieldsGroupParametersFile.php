<?php

namespace IlBronza\Accesses\Http\Controllers\Parameters\Datatables;

use IlBronza\Datatables\Providers\FieldsGroupParametersFile;

class AccessGateFieldsGroupParametersFile extends FieldsGroupParametersFile
{
	static function getFieldsGroup() : array
	{
		return [
			'translationPrefix' => 'accesses::fields',
			'fields' => [
				'mySelfPrimary' => 'primary',
				'mySelfEdit' => 'links.edit',
				'mySelfSee' => 'links.see',
				'name' => [
					'type' => 'flat',
					'order' => [
						'priority' => 100
					]
				],
				'code' => 'flat',
				'description' => 'flat',
				'mySelfDelete' => 'links.delete'
			]
		];
	}
}
