<?php

namespace App\Filament\Plugins\Settings;

use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ViewField;

class SeoFieldsForm
{
    public static function get($data): array
    {
        return [
            ViewField::make('seo_description')
                ->hiddenLabel()
                ->view('filament.components.seo-description'),
            Split::make([
                Section::make([
                    TextInput::make('seo_title')
                        ->label(trans('SEO title')),
                    TextInput::make('seo_keywords')
                        ->label(trans('SEO keywords'))
                        ->helperText(trans('Separate keywords with commas.')),
                    TextInput::make('seo_description')
                        ->label(trans('SEO description')),
                    Textarea::make('other_codes')
                        ->label(trans('SEO keywords')),
                    Select::make('seo_page')->options([
                        'home' => 'Home',
                        'contact-us' => 'Əlaqə',
                        'service' => 'Servis',
                        'about' => 'Haqqımızda',
                        'news' => 'Xəbərlər',
                    ])->required()->native(false)
                ]),
                Section::make([
                    ViewField::make('seo_preview')
                        ->hiddenLabel()
                        ->view('filament.components.seo-preview', $data),
                ]),
            ]),
        ];
    }
}
