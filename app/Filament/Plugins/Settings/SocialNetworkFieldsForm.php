<?php

namespace App\Filament\Plugins\Settings;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;

class SocialNetworkFieldsForm
{
    public static function get($data): array
    {
        $fields = [];
        foreach ($data as $key => $value) {
            if ($key == 'instagram_url' || $key == 'facebook_url' || $key == 'whatsapp_number') {
                $fields[] = TextInput::make($key)
                    ->default($value)
                    ->label(trans(ucwords(str_replace('_', ' ', $key))));
            }
        }

        return [Section::make($fields)];
    }

}
