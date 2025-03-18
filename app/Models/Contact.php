<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Contact extends Model
{
    protected $table = 'contacts';
    protected $fillable = [
        'full_name', 'phone', 'email', 'message'
    ];

}
