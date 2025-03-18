<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Service extends Model
{

    protected $fillable = [
        'az_name', 'ru_name', 'en_name', 'az_content',
        'ru_content', 'en_content', 'icon', 'image',
        'banner_image', 'is_active', 'show_in_home_page',
    ];

    public function keywords()
    {
        return $this->hasMany(Keyword::class);
    }
    protected static function booted()
    {
        static::saving(function ($service) {
            if (!$service->exists || empty($service->slug)) {
                $service->slug = Str::slug($service->az_name);
                $service->slug = static::generateUniqueSlug($service->slug);
            }
        });
    }

    protected static function generateUniqueSlug($slug)
    {
        $originalSlug = $slug;
        $count = 1;

        while (static::where('slug', $slug)->exists()) {
            $slug = "{$originalSlug}-{$count}";
            $count++;
        }

        return $slug;
    }

}
