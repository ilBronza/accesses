<?php

namespace IlBronza\Accesses\Http\Controllers\Parameters\Fieldsets;

use IlBronza\Form\Helpers\FieldsetsProvider\FieldsetParametersFile;

class AccessLogShowFieldsetsParameters extends FieldsetParametersFile
{
	public function _getFieldsetsParameters() : array
	{
		return [
			'base' => [
				'translationPrefix' => 'accesses::fields',
				'fields' => [
					'badge_code' => ['text' => 'string|required|max:64'],
					'accessed_at' => ['datetime' => 'date|required'],
					'access_type' => ['text' => 'string|required'],
					'raw_line' => ['textarea' => 'string|nullable'],
					'processing_status' => ['text' => 'string|nullable'],
					'processing_error' => ['textarea' => 'string|nullable']
				],
				'width' => ["1-3@l", '1-2@m']
			]
		];
	}
}
