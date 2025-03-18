<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class News extends Model
{
    protected $table = 'news';
    protected $fillable = [
        'slug', 'az_title', 'ru_title', 'en_title', 'is_active', 'az_content',
        'ru_content', 'en_content', 'main_image'
    ];

    public function images()
    {
        return $this->hasMany(NewsImage::class);
    }

    protected static function booted()
    {
        static::saving(function ($news) {
            if (!$news->exists || empty($news->slug)) {
                $news->slug = Str::slug($news->az_title);
                $news->slug = static::generateUniqueSlug($news->slug);
            }


            $news->slug = static::generateUniqueSlug($news->slug);
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
