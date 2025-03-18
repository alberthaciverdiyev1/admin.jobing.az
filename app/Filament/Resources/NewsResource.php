<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NewsResource\Pages;
use App\Filament\Resources\NewsResource\RelationManagers;
use App\Filament\Resources\NewsResource\RelationManagers\ImagesRelationManager;
use App\Models\News;
use Filament\Forms;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class NewsResource extends Resource
{
    protected static ?string $model = News::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';
    public function getTitle(): string|Htmlable
    {
        return trans('News');
    }
    public static function getLabel(): ?string
    {
        return trans('SingleNews');
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('tabs')->tabs([
                    Tab::make('az')->label('Az dili')->schema([
                        Forms\Components\TextInput::make('az_title')
                            ->translateLabel()
                            ->required()
                            ->maxLength(255),
                        Forms\Components\RichEditor::make('az_content')
                            ->translateLabel()
                            ->required(),
                    ]),
                    Tab::make('ru')->label('Rus dili')->schema([
                        Forms\Components\TextInput::make('ru_title')
                            ->translateLabel()
                            ->required()->maxLength(255),
                        Forms\Components\RichEditor::make('ru_content')
                            ->translateLabel()
                            ->required(),
                    ]),
                    Tab::make('en')->label('Ingilis dili')->schema([
                        Forms\Components\TextInput::make('en_title')
                            ->translateLabel()
                            ->required()->maxLength(255),
                        Forms\Components\RichEditor::make('en_content')
                            ->translateLabel()
                            ->required(),
                    ]),
                    Tab::make('')->label('Images')->schema([
                        Forms\Components\FileUpload::make('main_image')
                            ->label('Main Image')
                            ->translateLabel()
                            ->image()
                            ->required(),
                        Forms\Components\FileUpload::make('images')
                            ->multiple()
                            ->translateLabel()
                            ->label('Other Images'),
                        Forms\Components\Toggle::make('is_active')
                            ->translateLabel()
                            ->default(true)
                            ->required(),
                        Forms\Components\Toggle::make('show_in_home_page')
                            ->default(true)
                            ->translateLabel()
                            ->required(),
                    ])

                ])->columnSpanFull()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('az_title')
                    ->searchable()->tooltip(fn($record) => $record->az_title)
                    ->limit(17)
                ,
                Tables\Columns\TextColumn::make('az_content')
                    ->searchable()->tooltip(fn($record) => $record->az_content)->limit(50)
                ,
                Tables\Columns\ImageColumn::make('main_image'),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ReplicateAction::make(),
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
            ImagesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListNews::route('/'),
            'create' => Pages\CreateNews::route('/create'),
            'edit' => Pages\EditNews::route('/{record}/edit'),
        ];
    }
}
