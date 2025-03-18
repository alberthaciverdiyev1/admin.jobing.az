<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{

    protected $fillable = [
        'image', 'is_active','page','show_in_home_page','file'
    ];
}
