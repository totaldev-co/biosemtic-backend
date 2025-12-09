<?php

use App\Http\Controllers\Api\AboutUsController;
use App\Http\Controllers\Api\ContactPageController;
use App\Http\Controllers\Api\ContentController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\LayoutController;
use App\Http\Controllers\Api\ProductsController;
use App\Http\Controllers\Api\ServicesController;
use Illuminate\Support\Facades\Route;

Route::prefix('layout')->group(function () {
    Route::get('/', [LayoutController::class, 'index']);
    Route::get('/site-config', [LayoutController::class, 'siteConfig']);
    Route::get('/navigation', [LayoutController::class, 'navigation']);
    Route::get('/footer-services', [LayoutController::class, 'footerServices']);
});

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

Route::prefix('about-us')->group(function () {
    Route::get('/who-we-are', [AboutUsController::class, 'whoWeAre']);
    Route::get('/excellence', [AboutUsController::class, 'excellence']);
    Route::get('/values', [AboutUsController::class, 'values']);
    Route::get('/mission-vision', [AboutUsController::class, 'missionVision']);
    Route::get('/client-testimonials', [AboutUsController::class, 'clientTestimonials']);
    Route::get('/call-to-action', [AboutUsController::class, 'callToAction']);
});

Route::prefix('products')->group(function () {
    Route::get('/categories', [ProductsController::class, 'categories']);
    Route::get('/', [ProductsController::class, 'index']);
    Route::get('/faqs', [ProductsController::class, 'faqs']);
    Route::get('/category/{slug}', [ProductsController::class, 'byCategory']);
    Route::get('/{id}', [ProductsController::class, 'show']);
});

Route::prefix('services')->group(function () {
    Route::get('/items', [ServicesController::class, 'items']);
});

Route::prefix('contact-page')->group(function () {
    Route::get('/form-image', [ContactPageController::class, 'formImage']);
    Route::get('/info-cards', [ContactPageController::class, 'infoCards']);
});

Route::prefix('contact')->group(function () {
    Route::post('/request', [ContentController::class, 'storeContactRequest']);
});
