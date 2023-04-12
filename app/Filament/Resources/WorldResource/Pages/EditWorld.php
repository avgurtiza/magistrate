<?php

namespace App\Filament\Resources\WorldResource\Pages;

use App\Filament\Resources\WorldResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWorld extends EditRecord
{
    protected static string $resource = WorldResource::class;

    protected function getActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
