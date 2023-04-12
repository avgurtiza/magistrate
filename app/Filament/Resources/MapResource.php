<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MapResource\Pages;
use App\Models\Map;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class MapResource extends Resource
{
    protected static ?string $model = Map::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('world_id')
                    ->relationship('world', 'name')
                    ->required(),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->required()
                    ->maxLength(65535),
                Forms\Components\TextInput::make('recommended_player_count')
                    ->numeric()
                    ->maxValue(9000)
                    ->minValue(0)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('world.name'),
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('description'),
                Tables\Columns\TextColumn::make('recommended_player_count'),
                Tables\Columns\TextColumn::make('user.name'),
                /*
                Tables\Columns\TextColumn::make('metadata'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
                */
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMaps::route('/'),
            'create' => Pages\CreateMap::route('/create'),
            'view' => Pages\ViewMap::route('/{record}'),
            'edit' => Pages\EditMap::route('/{record}/edit'),
        ];
    }
}
