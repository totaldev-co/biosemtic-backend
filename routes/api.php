<?php

use App\Http\Controllers\Api\ContentController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\LayoutController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes - Layout (Header/Footer)
|--------------------------------------------------------------------------
*/

Route::prefix('layout')->group(function () {
    Route::get('/', [LayoutController::class, 'index']);
    Route::get('/site-config', [LayoutController::class, 'siteConfig']);
    Route::get('/navigation', [LayoutController::class, 'navigation']);
    Route::get('/footer-services', [LayoutController::class, 'footerServices']);
});

/*
|--------------------------------------------------------------------------
| API Routes - Home Page Content
|--------------------------------------------------------------------------
*/

Route::prefix('home')->group(function () {
    Route::get('/section-settings', [HomeController::class, 'sectionSettings']);
    Route::get('/hero-slides', [HomeController::class, 'heroSlides']);
    Route::get('/about', [HomeController::class, 'about']);
    Route::get('/services', [HomeController::class, 'services']);
    Route::get('/clients', [HomeController::class, 'clients']);
    Route::get('/news', [HomeController::class, 'news']);
    Route::get('/brands', [HomeController::class, 'brands']);
    Route::get('/contact-info', [HomeController::class, 'contactInfo']);
});

/*
|--------------------------------------------------------------------------
| API Routes - Contact Form
|--------------------------------------------------------------------------
*/

Route::prefix('contact')->group(function () {
    Route::post('/request', [ContentController::class, 'storeContactRequest']);
});
