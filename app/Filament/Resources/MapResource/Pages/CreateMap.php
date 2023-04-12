<?php

namespace App\Filament\Resources\MapResource\Pages;

use App\Filament\Resources\MapResource;
use Filament\Resources\Pages\CreateRecord;

class CreateMap extends CreateRecord
{
    protected static string $resource = MapResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();

        return $data;
    }
}
