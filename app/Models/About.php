<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $table = 'abouts';

    protected $fillable = [
        'banner_image', 'az_content', 'ru_content', 'en_content','page'
    ];
}
