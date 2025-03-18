<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('/', function () {
    return redirect('/admin');
});


Route::get('lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'az', 'ru'])) {
        Session::put('locale', $locale);
    }
    return redirect()->back();
})->name('lang.switch');

Route::prefix('tools')->group(function () {
    Route::get('optimize-clear', function () {
        Artisan::call('optimize:clear');
        return response()->json(['message' => Artisan::output()]);
    });
    Route::get('storage-link', function () {
        Artisan::call('storage:link');
        return response()->json(['message' => Artisan::output()]);
    });
});
