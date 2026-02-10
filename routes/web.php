<?php

use Illuminate\Support\Facades\Route;

// FRONTEND
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ProductController as FrontendProductController;

// ADMIN
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\FooterSettingController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\TermsConditionController;

/*
|--------------------------------------------------------------------------
| FRONTEND
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])
    ->name('home');

/**
 * Detail layanan
 * contoh: /produk/1
 */
Route::get('/produk/{product}', [FrontendProductController::class, 'show'])
    ->name('frontend.products.show');


/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        Route::resource('banners', BannerController::class);
        Route::resource('products', ProductController::class);
        Route::resource('galleries', GalleryController::class);
        Route::resource('testimonials', TestimonialController::class);

        // WEBSITE SETTINGS (FOOTER)
        Route::get('/footer', [FooterSettingController::class, 'edit'])
            ->name('footer.edit');

        Route::post('/footer', [FooterSettingController::class, 'update'])
            ->name('footer.update');

        // TERMS & CONDITIONS
        Route::get('/terms', [TermsConditionController::class, 'index'])
            ->name('terms.index');

        Route::get('/terms/create', [TermsConditionController::class, 'create'])
            ->name('terms.create');

        Route::post('/terms', [TermsConditionController::class, 'store'])
            ->name('terms.store');

        Route::get('/terms/{terms}/edit', [TermsConditionController::class, 'edit'])
            ->name('terms.edit');

        Route::put('/terms/{terms}', [TermsConditionController::class, 'update'])
            ->name('terms.update');

    });


/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';
