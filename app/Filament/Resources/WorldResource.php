<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WorldResource\Pages;
use App\Filament\Resources\WorldResource\RelationManagers;
use App\Models\World;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class WorldResource extends Resource
{
    protected static ?string $model = World::class;

    protected static ?string $navigationIcon = 'heroicon-o-globe';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->required()
                    ->maxLength(65535),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('description'),
                Tables\Columns\TextColumn::make('user.name'),
                /*
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
                */
            ])
            ->filters([
                //
            ])
            ->headerActions([
            ])

            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\MapsRelationManager::class,
            RelationManagers\GamesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListWorlds::route('/'),
            'create' => Pages\CreateWorld::route('/create'),
            'view' => Pages\ViewWorld::route('/{record}'),
            'edit' => Pages\EditWorld::route('/{record}/edit'),
        ];
    }
}
