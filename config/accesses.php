<?php

use IlBronza\Accesses\Http\Controllers\AccessGates\AccessGateCreateStoreController;
use IlBronza\Accesses\Http\Controllers\AccessGates\AccessGateDestroyController;
use IlBronza\Accesses\Http\Controllers\AccessGates\AccessGateEditUpdateController;
use IlBronza\Accesses\Http\Controllers\AccessGates\AccessGateIndexController;
use IlBronza\Accesses\Http\Controllers\AccessGates\AccessGateShowController;
use IlBronza\Accesses\Http\Controllers\AccessLogs\AccessLogIndexController;
use IlBronza\Accesses\Http\Controllers\AccessLogs\AccessLogShowController;
use IlBronza\Accesses\Http\Controllers\BadgeAssignments\BadgeAssignmentCreateStoreController;
use IlBronza\Accesses\Http\Controllers\BadgeAssignments\BadgeAssignmentDestroyController;
use IlBronza\Accesses\Http\Controllers\BadgeAssignments\BadgeAssignmentEditUpdateController;
use IlBronza\Accesses\Http\Controllers\BadgeAssignments\BadgeAssignmentIndexController;
use IlBronza\Accesses\Http\Controllers\Badges\BadgeCreateStoreController;
use IlBronza\Accesses\Http\Controllers\Badges\BadgeDestroyController;
use IlBronza\Accesses\Http\Controllers\Badges\BadgeEditUpdateController;
use IlBronza\Accesses\Http\Controllers\Badges\BadgeIndexController;
use IlBronza\Accesses\Http\Controllers\Badges\BadgeShowController;
use IlBronza\Accesses\Http\Controllers\Parameters\Datatables\AccessGateFieldsGroupParametersFile;
use IlBronza\Accesses\Http\Controllers\Parameters\Datatables\AccessLogFieldsGroupParametersFile;
use IlBronza\Accesses\Http\Controllers\Parameters\Datatables\BadgeAssignmentByHolderFieldsGroupParametersFile;
use IlBronza\Accesses\Http\Controllers\Parameters\Datatables\BadgeAssignmentFieldsGroupParametersFile;
use IlBronza\Accesses\Http\Controllers\Parameters\Datatables\BadgeFieldsGroupParametersFile;
use IlBronza\Accesses\Http\Controllers\Parameters\Fieldsets\AccessGateCreateStoreFieldsetsParameters;
use IlBronza\Accesses\Http\Controllers\Parameters\Fieldsets\AccessGateEditUpdateFieldsetsParameters;
use IlBronza\Accesses\Http\Controllers\Parameters\Fieldsets\AccessGateShowFieldsetsParameters;
use IlBronza\Accesses\Http\Controllers\Parameters\Fieldsets\AccessLogShowFieldsetsParameters;
use IlBronza\Accesses\Http\Controllers\Parameters\Fieldsets\BadgeAssignmentCreateStoreFieldsetsParameters;
use IlBronza\Accesses\Http\Controllers\Parameters\Fieldsets\BadgeAssignmentEditUpdateFieldsetsParameters;
use IlBronza\Accesses\Http\Controllers\Parameters\Fieldsets\BadgeCreateStoreFieldsetsParameters;
use IlBronza\Accesses\Http\Controllers\Parameters\Fieldsets\BadgeEditUpdateFieldsetsParameters;
use IlBronza\Accesses\Http\Controllers\Parameters\Fieldsets\BadgeShowFieldsetsParameters;
use IlBronza\Accesses\Models\AccessGate;
use IlBronza\Accesses\Models\AccessLog;
use IlBronza\Accesses\Models\Badge;
use IlBronza\Accesses\Models\BadgeAssignment;

return [
	'routePrefix' => 'accesses',

	'roles' => ['administrator'],

	'models' => [

		'badge' => [
			'class' => Badge::class,
			'table' => 'accesses__badges',
			'fieldsGroupsFiles' => [
				'index' => BadgeFieldsGroupParametersFile::class
			],
			'parametersFiles' => [
				'create' => BadgeCreateStoreFieldsetsParameters::class,
				'edit' => BadgeEditUpdateFieldsetsParameters::class,
				'update' => BadgeEditUpdateFieldsetsParameters::class,
				'show' => BadgeShowFieldsetsParameters::class
			],
			'controllers' => [
				'index' => BadgeIndexController::class,
				'create' => BadgeCreateStoreController::class,
				'store' => BadgeCreateStoreController::class,
				'show' => BadgeShowController::class,
				'edit' => BadgeEditUpdateController::class,
				'update' => BadgeEditUpdateController::class,
				'destroy' => BadgeDestroyController::class
			]
		],

		'badgeAssignment' => [
			'class' => BadgeAssignment::class,
			'table' => 'accesses__badge_assignments',
			'fieldsGroupsFiles' => [
				'index' => BadgeAssignmentFieldsGroupParametersFile::class,
				'byHolder' => BadgeAssignmentByHolderFieldsGroupParametersFile::class
			],
			'parametersFiles' => [
				'create' => BadgeAssignmentCreateStoreFieldsetsParameters::class,
				'edit' => BadgeAssignmentEditUpdateFieldsetsParameters::class,
				'update' => BadgeAssignmentEditUpdateFieldsetsParameters::class
			],
			'controllers' => [
				'index' => BadgeAssignmentIndexController::class,
				'createByHolder' => BadgeAssignmentCreateStoreController::class,
				'store' => BadgeAssignmentCreateStoreController::class,
				'edit' => BadgeAssignmentEditUpdateController::class,
				'update' => BadgeAssignmentEditUpdateController::class,
				'destroy' => BadgeAssignmentDestroyController::class
			]
		],

		'accessGate' => [
			'class' => AccessGate::class,
			'table' => 'accesses__gates',
			'fieldsGroupsFiles' => [
				'index' => AccessGateFieldsGroupParametersFile::class
			],
			'parametersFiles' => [
				'create' => AccessGateCreateStoreFieldsetsParameters::class,
				'edit' => AccessGateEditUpdateFieldsetsParameters::class,
				'update' => AccessGateEditUpdateFieldsetsParameters::class,
				'show' => AccessGateShowFieldsetsParameters::class
			],
			'controllers' => [
				'index' => AccessGateIndexController::class,
				'create' => AccessGateCreateStoreController::class,
				'store' => AccessGateCreateStoreController::class,
				'show' => AccessGateShowController::class,
				'edit' => AccessGateEditUpdateController::class,
				'update' => AccessGateEditUpdateController::class,
				'destroy' => AccessGateDestroyController::class
			]
		],

		'accessLog' => [
			'class' => AccessLog::class,
			'table' => 'accesses__logs',
			'fieldsGroupsFiles' => [
				'index' => AccessLogFieldsGroupParametersFile::class
			],
			'parametersFiles' => [
				'show' => AccessLogShowFieldsetsParameters::class
			],
			'controllers' => [
				'index' => AccessLogIndexController::class,
				'show' => AccessLogShowController::class
			]
		]
	]
];
