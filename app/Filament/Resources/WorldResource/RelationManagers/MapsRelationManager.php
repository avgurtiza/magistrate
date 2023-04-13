<?php

namespace App\Filament\Resources\WorldResource\RelationManagers;

use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;

class MapsRelationManager extends RelationManager
{
    protected static string $relationship = 'maps';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),

                Forms\Components\Textarea::make('description')
                    ->maxLength(65535),

                Forms\Components\Select::make('recommended_player_count')
                    ->required()
                    ->options(range(1, 20)),

                Forms\Components\Select::make('rows')
                    ->required()
                    ->options(array_combine(range(5, 20), range(5, 20))),

                Forms\Components\Select::make('columns')
                    ->required()
                    ->options(array_combine(range(5, 20), range(5, 20))),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('recommended_player_count')->label('Players'),
                Tables\Columns\TextColumn::make('rows'),
                Tables\Columns\TextColumn::make('columns'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()->mutateFormDataUsing(function (array $data): array {
                    $data['user_id'] = auth()->id();

                    return $data;
                }),
                // Tables\Actions\AttachAction::make()->preloadRecordSelect(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }


}
