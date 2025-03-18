<?php

namespace App\Filament\Resources\ServiceResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KeywordsRelationManager extends RelationManager
{
    protected static string $relationship = 'keywords';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('az_keyword')
                    ->maxLength(255)
                    ->disabled(fn($state) => empty($state)),
                Forms\Components\TextInput::make('ru_keyword')
                    ->maxLength(255)
                    ->disabled(fn($state) => empty($state)),
                Forms\Components\TextInput::make('en_keyword')
                    ->maxLength(255)
                    ->disabled(fn($state) => empty($state)),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('az_keyword')
            ->columns([
                Tables\Columns\TextColumn::make('az_keyword'),
                Tables\Columns\TextColumn::make('ru_keyword'),
                Tables\Columns\TextColumn::make('en_keyword'),
            ])
            ->recordTitleAttribute('ru_keyword')
            ->filters([
                //
            ])
            ->headerActions([
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
