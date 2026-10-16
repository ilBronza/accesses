<?php

namespace IlBronza\Accesses\Http\Controllers\Parameters\Fieldsets;

use IlBronza\Form\Helpers\FieldsetsProvider\FieldsetParametersFile;

class BadgeAssignmentCreateStoreFieldsetsParameters extends FieldsetParametersFile
{
	public function _getFieldsetsParameters() : array
	{
		return [
			'base' => [
				'translationPrefix' => 'accesses::fields',
				'fields' => [
					'badge_id' => [
						'type' => 'select',
						'multiple' => false,
						'rules' => 'string|required|exists:' . config('accesses.models.badge.table') . ',id',
						'relation' => 'badge'
					],
					'valid_from' => ['date' => 'date|nullable'],
					'valid_to' => ['date' => 'date|nullable|after_or_equal:valid_from'],
					'notes' => ['textarea' => 'string|nullable']
				],
				'width' => ["1-3@l", '1-2@m']
			]
		];
	}
}
