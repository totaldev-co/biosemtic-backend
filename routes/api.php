<?php

use App\Http\Controllers\Api\AboutUsController;
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
| API Routes - About Us Page Content
|--------------------------------------------------------------------------
*/

Route::prefix('about-us')->group(function () {
    Route::get('/who-we-are', [AboutUsController::class, 'whoWeAre']);
    Route::get('/excellence', [AboutUsController::class, 'excellence']);
    Route::get('/values', [AboutUsController::class, 'values']);
    Route::get('/mission-vision', [AboutUsController::class, 'missionVision']);
    Route::get('/client-testimonials', [AboutUsController::class, 'clientTestimonials']);
    Route::get('/call-to-action', [AboutUsController::class, 'callToAction']);
});

/*
|--------------------------------------------------------------------------
| API Routes - Contact Form
|--------------------------------------------------------------------------
*/

Route::prefix('contact')->group(function () {
    Route::post('/request', [ContentController::class, 'storeContactRequest']);
});
