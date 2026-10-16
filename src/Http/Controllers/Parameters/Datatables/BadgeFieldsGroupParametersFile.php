<?php

namespace IlBronza\Accesses\Http\Controllers\Parameters\Datatables;

use IlBronza\Datatables\Providers\FieldsGroupParametersFile;

class BadgeFieldsGroupParametersFile extends FieldsGroupParametersFile
{
	static function getFieldsGroup() : array
	{
		return [
			'translationPrefix' => 'accesses::fields',
			'fields' => [
				'mySelfPrimary' => 'primary',
				'mySelfEdit' => 'links.edit',
				'mySelfSee' => 'links.see',
				'code' => [
					'type' => 'flat',
					'order' => [
						'priority' => 100
					]
				],
				'mySelfHolder' => [
					'type' => 'function',
					'function' => 'getCurrentHolderName'
				],
				'active' => 'editor.toggle',
				'notes' => 'flat',
				'mySelfDelete' => 'links.delete'
			]
		];
	}
}
