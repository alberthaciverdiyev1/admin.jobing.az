<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Seo extends Model
{

    protected $table = 'seo';
    protected $fillable = [
        'seo_title', 'seo_description', 'seo_keywords', 'other_codes', 'seo_page','seo_page_name','lang'
    ];


    protected static function booted()
    {
        static::saving(function ($seo) {
            if (News::where('slug', $seo->seo_page)->exists()) {
                $seo->seo_page_name = News::where('slug', $seo->seo_page)->value('az_title');
            } elseif (Service::where('slug', $seo->seo_page)->exists()) {
                $seo->seo_page_name = Service::where('slug', $seo->seo_page)->value('az_name');
            } else {
                $main_pages = [
                    'home' => __('Home Page'),
                    'history' => __('History Page'),
                    'activity' => __('Activity Page'),
                    'documents' => __('Documents Page'),
                    'gallery' => __('Gallery Page'),
                    'contact' => __('Contact Us Page'),
                    'news' => __('News Page'),
                ];

                $seo->seo_page_name = $main_pages[$seo->seo_page] ?? '';
            }
        });
    }


}
