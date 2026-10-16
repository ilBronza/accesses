<?php

namespace IlBronza\Accesses;

use IlBronza\Accesses\Models\AccessGate;
use IlBronza\Accesses\Models\AccessLog;
use IlBronza\Accesses\Models\Badge;
use IlBronza\Accesses\Models\BadgeAssignment;
use IlBronza\CRUD\Traits\IlBronzaPackages\IlBronzaServiceProviderPackagesTrait;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;

class AccessesServiceProvider extends ServiceProvider
{
	use IlBronzaServiceProviderPackagesTrait;

	/**
	 * Perform post-registration booting of services.
	 *
	 * @return void
	 */
	public function boot() : void
	{
		Relation::morphMap([
			'Badge' => Badge::getProjectClassName(),
			'BadgeAssignment' => BadgeAssignment::getProjectClassName(),
			'AccessGate' => AccessGate::getProjectClassName(),
			'AccessLog' => AccessLog::getProjectClassName(),
		]);

		$this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'accesses');
		$this->loadViewsFrom(__DIR__ . '/../resources/views', 'accesses');
		$this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
		$this->loadRoutesFrom(__DIR__ . '/../routes/accesses.php');

		// Publishing is only necessary when using the CLI.
		if ($this->app->runningInConsole())
		{
			$this->bootForConsole();
		}
	}

	/**
	 * Register any package services.
	 *
	 * @return void
	 */
	public function register() : void
	{
		$this->mergeConfigFrom(__DIR__ . '/../config/accesses.php', 'accesses');

		// Register the service the package provides.
		$this->app->singleton('accesses', function ($app)
		{
			return new Accesses;
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return ['accesses'];
	}

	/**
	 * Console-specific booting.
	 *
	 * @return void
	 */
	protected function bootForConsole() : void
	{
		// Publishing the configuration file.
		$this->publishes([
			__DIR__ . '/../config/accesses.php' => config_path('accesses.php'),
		], 'accesses.config');
	}
}
