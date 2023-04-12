<?php

namespace App\Filament\Resources\WorldResource\Pages;

use App\Filament\Resources\WorldResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewWorld extends ViewRecord
{
    protected static string $resource = WorldResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
