<?php

namespace IlBronza\Accesses\Http\Controllers\Parameters\Datatables;

use IlBronza\Datatables\Providers\FieldsGroupParametersFile;

class AccessLogFieldsGroupParametersFile extends FieldsGroupParametersFile
{
	static function getFieldsGroup() : array
	{
		return [
			'translationPrefix' => 'accesses::fields',
			'fields' => [
				'mySelfPrimary' => 'primary',
				'mySelfSee' => 'links.see',
				'accessed_at' => [
					'type' => 'dates.datetime',
					'order' => [
						'priority' => 100,
						'direction' => 'desc'
					]
				],
				'badge_code' => 'flat',
				'mySelfHolder' => [
					'type' => 'function',
					'function' => 'getHolderName'
				],
				'accessGate.name' => 'flat',
				'access_type' => 'flat',
				'processing_status' => 'flat'
			]
		];
	}
}
