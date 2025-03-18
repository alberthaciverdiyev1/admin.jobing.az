<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsImage extends Model
{
    protected $table = 'news_images';
    protected $fillable = [
        'image', 'news_id'
    ];

    public function news()
    {
        return $this->belongsTo(News::class);
    }
}
