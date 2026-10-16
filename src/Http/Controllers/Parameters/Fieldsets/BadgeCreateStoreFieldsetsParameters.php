<?php

namespace IlBronza\Accesses\Http\Controllers\Parameters\Fieldsets;

use IlBronza\Form\Helpers\FieldsetsProvider\FieldsetParametersFile;

class BadgeCreateStoreFieldsetsParameters extends FieldsetParametersFile
{
	public function _getFieldsetsParameters() : array
	{
		return [
			'base' => [
				'translationPrefix' => 'accesses::fields',
				'fields' => [
					'code' => ['text' => 'string|required|max:64'],
					'active' => ['boolean' => 'boolean|nullable'],
					'notes' => ['textarea' => 'string|nullable']
				],
				'width' => ["1-3@l", '1-2@m']
			]
		];
	}
}
