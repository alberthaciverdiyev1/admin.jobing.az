<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceResource\Pages;
use App\Filament\Resources\ServiceResource\RelationManagers;
use App\Models\Service;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;

    protected static ?string $navigationIcon = 'heroicon-o-wrench-screwdriver';

    public function getTitle(): string|Htmlable
    {
        return trans('Services');
    }
    public static function getLabel(): ?string
    {
        return trans('Services');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('tabs')->tabs([
                    Tab::make('az')->label('Aze')->translateLabel()->schema([
                        Forms\Components\TextInput::make('az_name')
                            ->required()->translateLabel(),
                        Forms\Components\RichEditor::make('az_content')
                            ->required()->translateLabel(),
                    ]),
                    Tab::make('ru')->label('Rus')->translateLabel()->schema([
                        Forms\Components\TextInput::make('ru_name')
                            ->required()->translateLabel(),
                        Forms\Components\RichEditor::make('ru_content')
                            ->required()->translateLabel(),
                    ]),
                    Tab::make('en')->label('Eng')->translateLabel()->schema([
                        Forms\Components\TextInput::make('en_name')
                            ->required()->translateLabel(),
                        Forms\Components\RichEditor::make('en_content')
                            ->required()->translateLabel(),
                    ]),
                    Tab::make('keyword')->label('Keywords')->translateLabel()->schema([
                        Grid::make(3)
                            ->schema([
                                Repeater::make('az_keywords')->label(false)
                                    ->schema([
                                        TextInput::make('az_keywords'),
                                    ])->translateLabel()
                                    ->createItemButtonLabel('Açar söz əlavə et'),
                                Repeater::make('en_keywords')->label(false)->collapsible(false)
                                    ->schema([
                                        TextInput::make('en_keywords')->label('Add Keywords'),
                                    ])->translateLabel()
                                    ->createItemButtonLabel('Add En Keyword'),

                                Repeater::make('ru_keywords')->label(false)
                                    ->schema([
                                        TextInput::make('ru_keywords')->label('Русские Ключевые Слова'),
                                    ])->translateLabel()
                                    ->createItemButtonLabel('Add Ru Keyword'),

                            ]),

                    ]),
                    Tab::make('images')->label('Şəkillər')->schema([
                        Forms\Components\FileUpload::make('banner_image')
                            ->required()->translateLabel(),
                        Forms\Components\FileUpload::make('icon')
                            ->required()->translateLabel(),
                        Forms\Components\FileUpload::make('image')
                            ->required()->translateLabel(),
                        Forms\Components\Toggle::make('is_active')
                            ->required()->default(true)->translateLabel(),
                        Forms\Components\Toggle::make('show_in_home_page')->translateLabel()
                            ->required()->default(true),
                    ]),
                    Tab::make('config')->label('Configuration')->translateLabel()->schema([
                        Forms\Components\Toggle::make('is_active')
                            ->required()->default(true)->translateLabel(),
                        Forms\Components\Toggle::make('show_in_home_page')->translateLabel()
                            ->required()->default(true),
                    ]),
                ])->columnSpanFull()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('az_name')->label('Ad')
                    ->limit(17)
                    ->tooltip(fn ($record) => $record->az_name)
                    ->searchable(),
                Tables\Columns\TextColumn::make('az_content')->label('Məzmun')
                    ->limit(30)
                    ->tooltip(fn ($record) => $record->az_content)
                    ->searchable(),
                Tables\Columns\ImageColumn::make('icon')->translateLabel(),
                Tables\Columns\ImageColumn::make('image')->translateLabel(),
                Tables\Columns\ImageColumn::make('banner_image')->translateLabel(),
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
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            RelationManagers\KeywordsRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'edit' => Pages\EditService::route('/{record}/edit'),
        ];
    }
}
