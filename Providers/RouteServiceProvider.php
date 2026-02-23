<?php

namespace Modules\ClientMasterNew\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    protected $moduleNamespace = 'Modules\\ClientMasterNew\\Http\\Controllers';

    public function boot(): void
    {
        parent::boot();
    }

    public function map(): void
    {
        $this->mapWebRoutes();
    }

    protected function mapWebRoutes(): void
    {
        Route::middleware(['web', 'auth'])
            ->prefix('cims/clientmaster')
            ->name('client.')
            ->namespace($this->moduleNamespace)
            ->group(module_path('ClientMasterNew', '/Routes/web.php'));
    }
}
