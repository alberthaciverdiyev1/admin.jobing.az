<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SeoResource\Pages;
use App\Filament\Resources\SeoResource\RelationManagers;
use App\Models\Seo;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SeoResource extends Resource
{
    protected static ?string $model = Seo::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function getNavigationGroup(): ?string
    {
        return trans('Configurations');
    }
    public static function getNavigationLabel(): string
    {
        return trans('SEO');
    }
    public static function getLabel(): ?string
    {
        return trans('SEO');
    }
    public static function form(Form $form): Form
    {
        $news = \App\Models\News::where('is_active', true)->pluck('az_title', 'slug')->toArray() ?? [];
        $services = \App\Models\Service::where('is_active', true)->pluck('az_name', 'slug')->toArray() ?? [];
        $main_pages = [
            'home' => __('Home Page'),
            'history' => __('History Page'),
            'activity' => __('Activity Page'),
            'documents' => __('Documents Page'),
            'gallery' => __('Gallery Page'),
            'contact' => __('Contact Us Page'),
            'news' => __('News Page'),
        ];

        return $form
            ->schema([
                Forms\Components\TextInput::make('seo_title')
                    ->default(null),
                Forms\Components\TextInput::make('seo_description')
                    ->default(null),
                Forms\Components\TextInput::make('seo_keywords')
                    ->default(null),
                Forms\Components\Select::make('seo_page')
                    ->options(array_merge($main_pages, $news, $services))
                    ->native(false)
                    ->required()
                    ->default(null),
                Forms\Components\Select::make('lang')
                    ->options([
                        'az' => 'Azərbaycan dili',
                        'ru' => 'Rus dili',
                        'en' => 'İngilis dili',
                    ])
                    ->required()
                    ->native(false)
                    ->default(null),
                Forms\Components\Textarea::make('other_codes')->label('Other Codes')
                    ->maxLength(255)
                    ->default(null)
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('lang')
                    ->translateLabel()
                    ->searchable()
                    ->tooltip(fn($record) => $record->seo_title),
                Tables\Columns\TextColumn::make('seo_title')
                    ->searchable()
                    ->tooltip(fn($record) => $record->seo_title)
                    ->limit(20),
                Tables\Columns\TextColumn::make('seo_description')
                    ->limit(20)
                    ->tooltip(fn($record) => $record->seo_description)
                    ->searchable(),
                Tables\Columns\TextColumn::make('seo_keywords')
                    ->searchable()
                    ->limit(20)
                    ->tooltip(fn($record) => $record->seo_keywords),

                Tables\Columns\TextColumn::make('other_codes')
                    ->translateLabel()
                    ->searchable()
                    ->limit(20)
                    ->tooltip(fn($record) => $record->other_codes),

                Tables\Columns\TextColumn::make('seo_page_name')
                    ->translateLabel()
                    ->searchable()
                    ->translateLabel()
                    ->limit(20)
                    ->tooltip(fn($record) => $record->seo_page_name),

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
            'index' => Pages\ListSeos::route('/'),
            'create' => Pages\CreateSeo::route('/create'),
            'edit' => Pages\EditSeo::route('/{record}/edit'),
        ];
    }
}
