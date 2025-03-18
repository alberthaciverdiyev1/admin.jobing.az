<?php

namespace App\Filament\Pages;

use App\Filament\Plugins\Settings\GeneralSettingForm;
use App\Filament\Plugins\Settings\SeoFieldsForm;
use App\Filament\Plugins\Settings\SocialNetworkFieldsForm;
use App\Models\Seo;
use Filament\Actions\Action;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\Facades\Cache;
use Filament\Notifications\Notification;

class Setting extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-cog';
    protected static string $view = 'filament.pages.setting';
    public static function getNavigationGroup(): ?string
    {
        return trans('Configurations');
    }
    public function getTitle(): string|Htmlable
    {
        return trans('Settings');
    }

    /**
     * @return string|null
     */
    public static function getNavigationLabel(): string
    {
        return trans('Settings');
    }

    public ?array $settingData = [];
    public ?array $seoData = [];

    public function mount(): void
    {
        $this->settingData = \App\Models\Setting::first()?->only(
            [   'phone_number_1',
                'phone_number_2',
                'phone_number_3',
                'whatsapp_number',
                'email',
                'address',
                'google_map_location',
                'instagram_url',
                'facebook_url',
                'favicon',
                'logo',
                'banner_video',
                'en_company_name',
                'az_company_name',
                'ru_company_name',
                'en_about_company',
                'az_about_company',
                'ru_about_company',
            ]) ?? [];

        $this->seoData = Seo::first()?->toArray() ?: [];

        $this->form->fill($this->settingData);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('Tabs')->tabs([
                    Tabs\Tab::make('General Setting')
                        ->label(trans('General Setting'))
                        ->icon('heroicon-o-cog-8-tooth')
                        ->schema(GeneralSettingForm::get($this->settingData))
                        ->columns(2),
                    Tabs\Tab::make('About Company')
                        ->label(trans('About Company'))
                        ->icon('heroicon-o-information-circle')
                        ->schema([
                            MarkdownEditor::make('az_company_name')
                                ->statePath('az_company_name')
                                ->translateLabel()
                                ->default($this->settingData['az_company_name'] ?? null)
                                ->extraAttributes(['style' => 'height: 100px;']),
                            RichEditor::make('az_about_company')
                                ->statePath('az_about_company')
                                ->translateLabel()
                                ->default($this->settingData['az_about_company'] ?? null)
                                ->extraAttributes(['style' => 'height: 150px;']),

                            MarkdownEditor::make('ru_company_name')
                                ->statePath('ru_company_name')
                                ->translateLabel()
                                ->default($this->settingData['ru_company_name'] ?? null)
                                ->extraAttributes(['style' => 'height: 100px;']),

                            RichEditor::make('ru_about_company')
                                ->statePath('ru_about_company')
                                ->translateLabel()
                                ->default($this->settingData['ru_about_company'] ?? null)
                                ->extraAttributes(['style' => 'height: 150px;']),

                            MarkdownEditor::make('en_company_name')
                                ->statePath('en_company_name')
                                ->translateLabel()
                                ->default($this->settingData['en_company_name'] ?? null)
                                ->extraAttributes(['style' => 'height: 100px;']),

                            RichEditor::make('en_about_company')
                                ->statePath('en_about_company')
                                ->translateLabel()
                                ->default($this->settingData['en_about_company'] ?? null)
                                ->extraAttributes(['style' => 'height: 150px;']),

                        ])
                        ->columns(2),
//                    Tabs\Tab::make('Seo Tab')
//                        ->label(trans('SEO'))
//                        ->icon('heroicon-o-window')
//                        ->schema(SeoFieldsForm::get($this->seoData))
//                        ->columns(1),
                ])->persistTab()->persistTabInQueryString()->id('setting'),
            ])->statePath('settingData');
    }

    protected function getFormActions(): array
    {
        return [
            Action::make('Save')
                ->label(trans('Save'))
                ->color('primary')
                ->submit('update'),
        ];
    }

    public function update(): void
    {
        $data = $this->form->getState();

        $data = $this->clearVariables($data);

        \App\Models\Setting::updateOrCreate([], $data);
        Cache::forget('general_settings');

        $this->successNotification(trans('Settings saved successfully.'));
        redirect(request()?->header('Referer'));
    }

    private function clearVariables(array $data): array
    {
        unset($data['seo_preview']);
        return $data;
    }

    private function successNotification(string $title): void
    {
        Notification::make()
            ->title($title)
            ->success()
            ->send();
    }
}
