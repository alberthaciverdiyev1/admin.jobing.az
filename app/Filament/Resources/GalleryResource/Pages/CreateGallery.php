<?php

namespace App\Filament\Resources\GalleryResource\Pages;

use App\Filament\Resources\DocumentResource;
use App\Filament\Resources\GalleryResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateGallery extends CreateRecord
{
    protected static string $resource = GalleryResource::class;
    protected function beforeCreate(): void
    {
        // Runs before the form fields are saved to the database.
    }
}
