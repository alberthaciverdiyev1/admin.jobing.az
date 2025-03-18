<?php

use App\Models\Setting;
use App\Models\Service;
use Illuminate\Support\Str;

function getServices(bool $only_home_page = false)
{
    $lang = app()->getLocale();
    $query = Service::where('is_active', 1)->orderBy('created_at', 'desc')
        ->with(['keywords' => function ($query) use ($lang) {
            $query->select('service_id', $lang . '_keyword as name');
        }]);

    if ($only_home_page) {
        $query->where('show_in_home_page', true);
    }

    return $query->get()->map(function ($service) use ($lang) {
        $service->content = Str::words(strip_tags($service->{$lang . '_content'}), 10, '...');
        $service->name = Str::words($service->{$lang . '_name'}, 10, '...');
        return $service;
    });
}


function settings()
{
    return Setting::first();
}

function ceo($page = 'home')
{
    $lang = app()->getLocale();
    $routeName = request()->route()->getName();

    $route = null;
    if ($routeName == 'newsDetails') {
        $route = request()->route('slug') ?? 'newsDetails';
    } else if ($routeName == 'service') {
        $route = request()->route('slug') ?? 'service';

    } else if ($routeName == 'about') {
        $route = request()->route('variable');
    } else {
        $route = $routeName;
    }
    return \App\Models\Seo::where('seo_page', $route)->where('lang',$lang)->first();
}

function ceoTitle()
{
    if (ceo()) return strip_tags(ceo()?->getAttribute('seo_title')) . ' » ' . __(ceo()->getAttribute('seo_page_name'));
    return null;

}

function ceoDescription()
{
    if (ceo()) return ceo()?->getAttribute('seo_description');
    return null;
}

function ceoKeywords()
{
    if (ceo()) return ceo()?->getAttribute('seo_keywords');
    return null;
}

function ceoOtherCodes()
{
    if (ceo()) return ceo()?->getAttribute('other_codes') ;
    return null;
}

function googleMapLocation(): string
{
    return settings()->getAttribute('google_map_location');
}

function siteFavicon(): string|null
{
    return asset('/storage/' . settings()->getAttribute('favicon'));
}

function siteLogo(): string|null
{
    return asset('/storage/' . settings()->getAttribute('logo'));
}

function siteEmail(): string|null
{
    return settings()->getAttribute('email');
}

function siteAddress(): string|null
{
    return settings()->getAttribute('address');
}

function sitePhoneNo1(): string|null
{
    return settings()->getAttribute('phone_number_1');
}

function sitePhoneNo2(): string|null
{
    return settings()->getAttribute('phone_number_2');
}

function sitePhoneNo3(): string|null
{
    return settings()->getAttribute('phone_number_3');
}

function siteInstagram(): string|null
{
    return settings()->getAttribute('instagram_url') ?? null;
}

function siteFacebook(): string|null
{
    return settings()->getAttribute('facebook_url') ?? null;
}

function siteWhatsapp(): string|null
{
    return settings()->getAttribute('whatsapp_number') ?? null;
}

function bannerVideo(): string|null
{
    return asset('/storage/' . settings()->getAttribute('banner_video'));
}

function companyName(): string|null
{
    $lang = app()->getLocale();
    return settings()->getAttribute($lang . '_company_name');
}

function companyAbout(): string|null
{
    $lang = app()->getLocale();
    return settings()->getAttribute($lang . '_about_company');
}

