<?php

namespace App\Providers;

use Carbon\CarbonImmutable;
use Filament\Facades\Filament;
use Illuminate\Support\Facades\DB;
use Filament\View\PanelsRenderHook;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Vite;
use Illuminate\Support\Facades\Blade;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Filament\Support\Facades\FilamentView;

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
        // Model::shouldBeStrict();
        Model::preventLazyLoading(true);
        Model::unguard();
        DB::prohibitDestructiveCommands(app()->isProduction());
        Date::use(CarbonImmutable::class);
        Vite::useAggressivePrefetching();

        if (app()->environment(['production'])) {
            URL::forceHttps();
            URL::forceScheme('https');
            request()->server->set('HTTPS', request()->header('X-Forwarded-Proto', 'https') == 'https' ? 'on' : 'off');
        }

        /*
        Filament::registerRenderHook(
            PanelsRenderHook::HEAD_END,
            fn (): string => Blade::render('@vite([\'resources/css/custom.css\'])'),
        );

        FilamentView::registerRenderHook(
            \Filament\Tables\View\TablesRenderHook::HEADER_BEFORE,
            fn(): string => Blade::render('<div
                    wire:loading.flex
                    wire:target="' . implode(',', \Filament\Tables\Table::LOADING_TARGETS) . '"
                    class="absolute inset-0 justify-center items-center z-30 hidden bg-transparent backdrop-blur-xs backdrop-grayscale transition-all"
                    style="background-image: linear-gradient(135deg, rgb(255 255 255 / var(--glass-opacity, 30%)), #0000), linear-gradient(var(--glass-reflex-degree, 100deg), rgb(255 255 255 / var(--glass-reflex-opacity, 10%)) 25%, rgb(0 0 0 / 0%) 25%);"
                >
                    <x-filament::loading-indicator class="h-8 w-8" />
                </div>'),
        );
        */
    }
}
