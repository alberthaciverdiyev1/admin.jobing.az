<?php

namespace App\Filament\Plugins\Settings;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ViewField;

class GeneralSettingForm
{

    public static function get($data): array
    {
        unset(
            $data['en_company_name'],
            $data['az_company_name'],
            $data['ru_company_name'],
            $data['en_about_company'],
            $data['az_about_company'],
            $data['ru_about_company'],
        );
        $fields = [];
        $columns = 2;
        $chunkedData = array_chunk($data, $columns, true);
        foreach ($chunkedData as $chunk) {
            $rowFields = [];

            foreach ($chunk as $key => $value) {
                if ($key == 'logo' || $key == 'favicon') {
                    $rowFields[] = FileUpload::make($key)
                        ->label(trans(ucwords(str_replace('_', ' ', $key))))
                        ->image()
                        ->helperText(trans('Upload your logo image here'));
                }elseif ($key == 'banner_video'){
                    $rowFields[] = FileUpload::make($key)
                        ->label('Banner Video or Image')
                        ->translateLabel()
                        ->maxSize(512000) // 500MB (KB cinsinden)
                        ->acceptedFileTypes(['image/*', 'video/*'])
                        ->helperText(trans('Upload your image or video here'));

            } else {
                    $rowFields[] = TextInput::make($key)
                        ->default($value)
                        ->label(trans(ucwords(str_replace('_', ' ', $key))));
                }
            }

            $fields[] = \Filament\Forms\Components\Grid::make($columns)
                ->schema($rowFields);
        }

        return [Section::make($fields)];
    }


}


