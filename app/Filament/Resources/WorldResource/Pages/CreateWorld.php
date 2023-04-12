<?php

namespace App\Filament\Resources\WorldResource\Pages;

use App\Filament\Resources\WorldResource;
use Filament\Resources\Pages\CreateRecord;

class CreateWorld extends CreateRecord
{
    protected static string $resource = WorldResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();

        return $data;
    }
}
