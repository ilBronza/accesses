<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	public function up() : void
	{
		Schema::create(config('accesses.models.badge.table'), function (Blueprint $table)
		{
			$table->uuid('id')->primary();

			$table->string('code', 64)->unique();
			$table->boolean('active')->nullable()->default(true);
			$table->text('notes')->nullable();

			$table->softDeletes();
			$table->timestamps();
		});
	}

	public function down() : void
	{
		Schema::dropIfExists(config('accesses.models.badge.table'));
	}
};
