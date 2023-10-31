<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Filament\Navigation\NavigationItem;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        Filament::serving(function () {
            Filament::registerNavigationItems([
                NavigationItem::make('bmd.technologie.com')
                    ->url('https://bmd.technologie.com', shouldOpenInNewTab: true)
                    ->icon('heroicon-o-globe-alt')
                    ->group('Créateur de contenu')
                    ->sort(3),
            ]);
        });

        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }
    }
}
