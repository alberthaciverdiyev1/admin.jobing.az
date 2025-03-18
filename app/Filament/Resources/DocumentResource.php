<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DocumentResource\Pages;
use App\Filament\Resources\DocumentResource\RelationManagers;
use App\Models\Document;
use Filament\Forms;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DocumentResource extends Resource
{
    protected static ?string $model = Document::class;

    public function getTitle(): string
    {
        return trans('Documents');
    }

    public static function getNavigationIcon(): ?string
    {
        return 'heroicon-o-rectangle-stack';
    }

    public static function getNavigationLabel(): string
    {
        return trans('Documents');
    }

    public static function getLabel(): ?string
    {
        return trans('Document');
    }

    public static function getNavigationGroup(): ?string
    {
        return trans('About Company');
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('page', 'document');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('image')
                    ->image()->columnSpan(2)
                    ->required(),
                Forms\Components\FileUpload::make('file')
                    ->columnSpan(2)
                    ->required(),
                Forms\Components\Toggle::make('is_active')->translateLabel()
                    ->required()->default(true),
                Hidden::make('page')->default('document')->dehydrated(true)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Image')
                    ->translateLabel()
                    ->height('50px'),
                Tables\Columns\IconColumn::make('is_active')->translateLabel()
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')->translateLabel()
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
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
            'index' => Pages\ListDocuments::route('/'),
            'edit' => Pages\EditDocument::route('/{record}/edit'),
        ];
    }
}
