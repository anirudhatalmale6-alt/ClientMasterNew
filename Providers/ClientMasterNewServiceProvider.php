<?php

namespace Modules\ClientMasterNew\Providers;

use Illuminate\Support\ServiceProvider;

class ClientMasterNewServiceProvider extends ServiceProvider
{
    protected string $moduleName = 'ClientMasterNew';
    protected string $moduleNameLower = 'clientmasternew';

    public function boot(): void
    {
        $this->registerViews();
        $this->loadMigrationsFrom(module_path($this->moduleName, 'Database/Migrations'));
        $this->registerEventListeners();
    }

    public function register(): void
    {
        $this->app->register(RouteServiceProvider::class);
    }

    protected function registerViews(): void
    {
        $viewPath = resource_path('views/modules/' . $this->moduleNameLower);
        $sourcePath = module_path($this->moduleName, 'Resources/views');
        $this->publishes([$sourcePath => $viewPath], ['views', $this->moduleNameLower . '-module-views']);
        $this->loadViewsFrom(array_merge($this->getPublishableViewPaths(), [$sourcePath]), $this->moduleNameLower);
    }

    private function getPublishableViewPaths(): array
    {
        $paths = [];
        foreach (\Config::get('view.paths') as $path) {
            if (is_dir($path . '/modules/' . $this->moduleNameLower)) {
                $paths[] = $path . '/modules/' . $this->moduleNameLower;
            }
        }
        return $paths;
    }

    protected function registerEventListeners(): void
    {
        $eventListeners = [
            \App\Events\MainApp\ViewComposer\ViewRendering::class => \Modules\ClientMasterNew\Listeners\MainApp\ViewRendering::class,
        ];

        foreach ($eventListeners as $event => $listener) {
            \Event::listen($event, $listener);
        }
    }
}
