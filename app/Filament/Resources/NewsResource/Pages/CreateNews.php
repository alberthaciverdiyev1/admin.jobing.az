<?php

namespace App\Filament\Resources\NewsResource\Pages;

use App\Filament\Resources\NewsResource;
use App\Models\NewsImage;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateNews extends CreateRecord
{
    protected static string $resource = NewsResource::class;

    protected function afterCreate(): void
    {
        if (!empty($this->data['images'])) {
            $images = [];
            foreach ($this->data['images'] as $image) {
                $images[] = [
                    'news_id' => $this->record->id,
                    'image' => $image,
                ];
            }

            NewsImage::insert($images);
        }
    }

}
