<?php

use IlBronza\Accesses\Accesses;
use Illuminate\Support\Facades\Route;

Route::group([
	'middleware' => ['web', 'auth'],
	'prefix' => 'accesses-manager',
	'as' => config('accesses.routePrefix'),
	'routeTranslationPrefix' => Accesses::getRouteTranslationPrefix()
	], function ()
{
	Route::group(['prefix' => 'badges'], function ()
	{
		Route::get('', [Accesses::getController('badge', 'index'), 'index'])->name('badges.index');
		Route::get('create', [Accesses::getController('badge', 'create'), 'create'])->name('badges.create');
		Route::post('', [Accesses::getController('badge', 'store'), 'store'])->name('badges.store');
		Route::get('{badge}', [Accesses::getController('badge', 'show'), 'show'])->name('badges.show');
		Route::get('{badge}/edit', [Accesses::getController('badge', 'edit'), 'edit'])->name('badges.edit');
		Route::put('{badge}', [Accesses::getController('badge', 'update'), 'update'])->name('badges.update');
		Route::delete('{badge}/delete', [Accesses::getController('badge', 'destroy'), 'destroy'])->name('badges.destroy');
	});

	Route::group(['prefix' => 'badge-assignments'], function ()
	{
		Route::get('', [Accesses::getController('badgeAssignment', 'index'), 'index'])->name('badgeAssignments.index');
		Route::get('create-by-holder/{class}/{key}', [Accesses::getController('badgeAssignment', 'createByHolder'), 'createByHolder'])->name('badgeAssignments.createByHolder');
		Route::post('', [Accesses::getController('badgeAssignment', 'store'), 'store'])->name('badgeAssignments.store');
		Route::get('{badgeAssignment}/edit', [Accesses::getController('badgeAssignment', 'edit'), 'edit'])->name('badgeAssignments.edit');
		Route::put('{badgeAssignment}', [Accesses::getController('badgeAssignment', 'update'), 'update'])->name('badgeAssignments.update');
		Route::delete('{badgeAssignment}/delete', [Accesses::getController('badgeAssignment', 'destroy'), 'destroy'])->name('badgeAssignments.destroy');
	});

	Route::group(['prefix' => 'access-gates'], function ()
	{
		Route::get('', [Accesses::getController('accessGate', 'index'), 'index'])->name('accessGates.index');
		Route::get('create', [Accesses::getController('accessGate', 'create'), 'create'])->name('accessGates.create');
		Route::post('', [Accesses::getController('accessGate', 'store'), 'store'])->name('accessGates.store');
		Route::get('{accessGate}', [Accesses::getController('accessGate', 'show'), 'show'])->name('accessGates.show');
		Route::get('{accessGate}/edit', [Accesses::getController('accessGate', 'edit'), 'edit'])->name('accessGates.edit');
		Route::put('{accessGate}', [Accesses::getController('accessGate', 'update'), 'update'])->name('accessGates.update');
		Route::delete('{accessGate}/delete', [Accesses::getController('accessGate', 'destroy'), 'destroy'])->name('accessGates.destroy');
	});

	Route::group(['prefix' => 'access-logs'], function ()
	{
		Route::get('', [Accesses::getController('accessLog', 'index'), 'index'])->name('accessLogs.index');
		Route::get('{accessLog}', [Accesses::getController('accessLog', 'show'), 'show'])->name('accessLogs.show');
	});
});
