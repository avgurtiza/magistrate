<?php

namespace App\Providers;

use App\Services\TilesetService;
use Filament\Facades\Filament;
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
        $this->app->bind(TilesetService::class, fn () => new TilesetService('Dungeon', '0x72_DungeonTilesetII_v1.4/frames'));
    }
}
