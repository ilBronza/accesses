<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	public function up() : void
	{
		Schema::create(config('accesses.models.badgeAssignment.table'), function (Blueprint $table)
		{
			$table->uuid('id')->primary();

			$table->uuid('badge_id');
			$table->foreign('badge_id')
				->references('id')
				->on(config('accesses.models.badge.table'))
				->onDelete('cascade');

			$table->uuidMorphs('holder');

			$table->timestamp('valid_from')->nullable();
			$table->timestamp('valid_to')->nullable();
			$table->text('notes')->nullable();

			$table->softDeletes();
			$table->timestamps();

			$table->index(['badge_id', 'valid_from', 'valid_to']);
		});
	}

	public function down() : void
	{
		Schema::dropIfExists(config('accesses.models.badgeAssignment.table'));
	}
};
