<?php

namespace App\Filament\Resources\ServiceResource\Pages;

use App\Filament\Resources\ServiceResource;
use App\Models\Keyword;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditService extends EditRecord
{
    protected static string $resource = ServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function afterSave(): void
    {
        $keywords = [];

        if (!empty($this->data['az_keywords'])) {
            if (is_array($this->data['az_keywords'])) {
                foreach ($this->data['az_keywords'] as $keyword) {
                    foreach ($keyword as $value) {
                        Keyword::insert([
                            'service_id' => $this->record->id,
                            'az_keyword' => $value,
                        ]);
                    }

                }

            }
        }
        if (!empty($this->data['ru_keywords'])) {
            if (is_array($this->data['ru_keywords'])) {
                foreach ($this->data['ru_keywords'] as $keyword) {
                    foreach ($keyword as $value) {
                        Keyword::insert([
                            'service_id' => $this->record->id,
                            'ru_keyword' => $value,
                        ]);
                    }

                }
            }
            if (!empty($this->data['en_keywords'])) {
                if (is_array($this->data['en_keywords'])) {
                    foreach ($this->data['en_keywords'] as $keyword) {
                        foreach ($keyword as $value) {
                            Keyword::insert([
                                'service_id' => $this->record->id,
                                'en_keyword' => $value,
                            ]);
                        }

                    }
                }

            }
        }
    }
}
