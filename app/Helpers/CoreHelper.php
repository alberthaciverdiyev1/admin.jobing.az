<?php

use App\Models\Setting;
use Illuminate\Support\Str;

function settings()
{
    return Setting::first();
}

function siteFavicon(): string|null
{
    return asset('/storage/' . settings()->getAttribute('favicon'));
}

function siteLogo(): string|null
{
    return asset('/storage/' . settings()->getAttribute('logo'));
}
function companyName(): string|null
{
    $lang = app()->getLocale();
    return settings()->getAttribute($lang . '_company_name');
}



