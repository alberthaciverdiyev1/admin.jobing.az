<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Keyword extends Model
{

    protected $fillable = [
        'service_id',
        'az_keyword',
        'ru_keyword',
        'en_keyword',
    ];
}
