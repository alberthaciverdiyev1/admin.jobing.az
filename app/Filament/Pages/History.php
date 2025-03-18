<?php

namespace App\Filament\Pages;

use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class History extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-clock';

    //protected static string $view = 'filament.pages.history';
    public function getView(): string
    {
        return 'filament.pages.history';
    }

    public function getTitle(): string
    {
        return trans('Our History');
    }

    public static function getNavigationLabel(): string
    {
        return trans('Our History');
    }
    public static function getNavigationGroup(): ?string
    {
        return trans('About Company');
    }
    public ?array $data = [];

    public function mount(): void
    {
        $this->data = \App\Models\About::where('page','history')->first()?->toArray() ?: [];
        if (isset($this->data['banner_image']) && is_string($this->data['banner_image'])) {
            $this->data['banner_image'] = [
                'name' => $this->data['banner_image'],
            ];
        }
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('Tabs')->tabs([
                    Tabs\Tab::make('az_content')
                        ->label(trans('Az content'))
                        ->icon('heroicon-o-cog-8-tooth')
                        ->schema([
                            FileUpload::make('banner_image')->label('Banner Şəkli')->image()->statePath('banner_image'),
                            RichEditor::make('az_content')->translateLabel(),
                        ])
                        ->columns(1),
                    Tabs\Tab::make('ru_content')
                        ->label(trans('Ru content'))
                        ->icon('heroicon-o-cog-8-tooth')
                        ->schema([
                            RichEditor::make('ru_content')->translateLabel(),
                        ])
                        ->columns(1),
                    Tabs\Tab::make('en_content')
                        ->label(trans('En content'))
                        ->icon('heroicon-o-cog-8-tooth')
                        ->schema([
                            RichEditor::make('en_content')->translateLabel(),
                        ])
                        ->columns(1),

                ])->persistTab()->persistTabInQueryString()->id('history'),
            ])->statePath('data');

    }

    protected function getFormActions(): array
    {
        return [
            Action::make('Save')
                ->label('Save')
                ->color('primary')
                ->submit('Update'),
        ];
    }

    public function update(): void
    {
        $formData = $this->form->getState();
        \App\Models\About::updateOrCreate(
            ['page' => 'history'],
            [
                'az_content' => $formData['az_content'] ?? null,
                'ru_content' => $formData['ru_content'] ?? null,
                'en_content' => $formData['en_content'] ?? null,
                'banner_image' => $formData['banner_image'] ?? null,
            ]
        );

        Notification::make()
            ->title(trans('History saved successfully.'))
            ->success()
            ->send();

        redirect(request()?->header('Referer'));
    }

}
