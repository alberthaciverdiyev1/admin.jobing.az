<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GalleryResource\Pages;
use App\Filament\Resources\GalleryResource\RelationManagers;
use App\Models\Document;
use Filament\Forms;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class GalleryResource extends Resource
{
    protected static ?string $model = Document::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';


    public static function getNavigationIcon(): ?string
    {
        return 'heroicon-o-photo';
    }

    public function getTitle(): string
    {
        return trans('Gallery');
    }

    public static function getLabel(): ?string
    {
        return trans('Gallery');
    }

    public static function getNavigationLabel(): string
    {
        return trans('Gallery');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('image')
                    ->acceptedFileTypes(['image/*', 'video/*'])
                    ->columnSpan(2)->translateLabel()
                    ->required(),
                Forms\Components\Toggle::make('is_active')->translateLabel()
                    ->required()->default(true),
                Forms\Components\Toggle::make('show_in_home_page')->default(true)->translateLabel(),
                Hidden::make('page')->default('gallery')->dehydrated(true)
            ]);
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('page', 'gallery');
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
//                Tables\Columns\ImageColumn::make('image')
//                    ->label('Image')
//                    ->translateLabel()
//                    ->height('50px'),


                Tables\Columns\TextColumn::make('image')
                    ->label('Media')
                    ->translateLabel()
                    ->formatStateUsing(function ($record) {
                        if (!$record->image) {
                            return '-';
                        }
                        $imageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'svg', 'bmp', 'tiff', 'tif', 'webp', 'ico', 'heic', 'avif'];
                        $videoExtensions = ['mp4', 'mov', 'avi', 'wmv', 'flv', 'mkv', '3gp', 'webm', 'mpg', 'mpeg','m4v', 'ts', 'rm', 'rmvb', 'asf', 'vob', 'ogv'];

                        if (Str::endsWith($record->image, $imageExtensions)) {
                            return '<img src="' . asset('storage/'.$record->image) . '" alt="Image" style="height: 80px;">';
                        } elseif (Str::endsWith($record->image, $videoExtensions)) {
                            return '<video src="' . asset('storage/'.$record->image) . '" controls style="height: 95px;"></video>';
                        }
                        return '-';
                    })
                    ->html(),
        Tables\Columns\IconColumn::make('is_active')->translateLabel()
            ->boolean(),
                Tables\Columns\IconColumn::make('show_in_home_page')->translateLabel()
                    ->boolean(),
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
            'index' => Pages\ListGallery::route('/'),
            'edit' => Pages\EditGallery::route('/{record}/edit'),
        ];
    }
}
