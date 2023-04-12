<?php

namespace App\Filament\Resources\WorldResource\Pages;

use App\Filament\Resources\WorldResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListWorlds extends ListRecords
{
    protected static string $resource = WorldResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
