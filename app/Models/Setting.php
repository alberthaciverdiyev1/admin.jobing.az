<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'settings';
    protected $fillable = [
        'phone_number_1',
        'phone_number_2',
        'phone_number_3',
        'whatsapp_number',
        'email',
        'address',
        'google_map_location',
        'instagram_url',
        'facebook_url',
        'favicon',
        'logo',
        'en_company_name',
        'az_company_name',
        'ru_company_name',
        'en_about_company',
        'az_about_company',
        'ru_about_company',
        'banner_video'
    ];

}
