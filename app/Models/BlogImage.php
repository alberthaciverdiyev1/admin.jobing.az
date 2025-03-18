<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogImage extends Model
{
    protected $table = 'blog_images';
    protected $fillable = [
        'image', 'blog_id'
    ];

    public function blogs()
    {
        return $this->belongsTo(Blog::class);
    }
}
