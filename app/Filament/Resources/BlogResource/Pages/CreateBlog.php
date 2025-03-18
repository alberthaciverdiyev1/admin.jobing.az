<?php

namespace App\Filament\Resources\BlogResource\Pages;

use App\Filament\Resources\BlogResource;
use App\Models\BlogImage;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateBlog extends CreateRecord
{
    protected static string $resource = BlogResource::class;

    protected function afterCreate(): void
    {
        if (!empty($this->data['images'])) {
            $images = [];
            foreach ($this->data['images'] as $image) {
                $images[] = [
                    'blog_id' => $this->record->id,
                    'image' => $image,
                ];
            }

            BlogImage::insert($images);
        }
    }
}
