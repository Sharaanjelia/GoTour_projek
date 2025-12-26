<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\Admin\PackageController as AdminPackageController;
use Illuminate\Support\Facades\Route;

// Render the app front page using HomeController so searches and content
// always go to the same home view (was previously the default Laravel welcome view).
Route::get('/', [HomeController::class, 'index'])->name('root');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Public Paket routes
Route::get('/paket', [PackageController::class, 'index'])->name('paket.index');
Route::get('/paket/{package:slug}', [PackageController::class, 'show'])->name('paket.show');
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Other public pages mapped from legacy PHP
Route::get('/blog', [\App\Http\Controllers\BlogController::class, 'index'])->name('blog.index');
Route::get('/destinasi', [\App\Http\Controllers\DestinationController::class, 'index'])->name('destinasi.index');
Route::get('/layanan', [\App\Http\Controllers\ServiceController::class, 'index'])->name('layanan.index');
Route::get('/discounts', [\App\Http\Controllers\DiscountController::class, 'index'])->name('discounts.index');
Route::get('/foto', [\App\Http\Controllers\PhotoController::class, 'index'])->name('foto.index');
Route::get('/testimoni', [\App\Http\Controllers\TestimonialController::class, 'index'])->name('testimoni.index');
Route::post('/testimoni', [\App\Http\Controllers\TestimonialController::class, 'store'])->name('testimoni.store');
Route::post('/pembayaran', [\App\Http\Controllers\PublicPaymentController::class, 'store'])->name('payments.store');

// Admin routes (protected by auth + IsAdmin middleware)
Route::middleware(['auth', \App\Http\Middleware\IsAdmin::class])->prefix('admin')->name('admin.')->group(function () {
    // Admin landing -- redirect to useful admin page (packages). Prevents 404 when visiting /admin
    Route::get('/', function () {
        return redirect()->route('admin.packages.index');
    })->name('dashboard');

    Route::resource('packages', AdminPackageController::class)->names('packages')->parameters(['packages' => 'package']);

    // Admin resources for converted legacy pages
    Route::resource('blog', \App\Http\Controllers\Admin\BlogPostController::class)->names('blog')->parameters(['blog' => 'blog']);
    Route::resource('destinations', \App\Http\Controllers\Admin\DestinationController::class)->names('destinations')->parameters(['destinations' => 'destination']);
    Route::resource('services', \App\Http\Controllers\Admin\ServiceController::class)->names('services')->parameters(['services' => 'service']);
    Route::resource('discounts', \App\Http\Controllers\Admin\DiscountController::class)->names('discounts')->parameters(['discounts' => 'discount']);
    Route::resource('testimonials', \App\Http\Controllers\Admin\TestimonialController::class)->names('testimonials')->parameters(['testimonials' => 'testimonial'])->except(['create','store','show']);
    Route::resource('photos', \App\Http\Controllers\Admin\PhotoRecommendationController::class)->names('photos')->parameters(['photos' => 'photo']);
    Route::resource('payments', \App\Http\Controllers\Admin\PaymentController::class)->names('payments')->parameters(['payments' => 'payment'])->only(['index','show','update','destroy']);

    // User management for admins (kept here for simplicity)
    Route::get('users', [\App\Http\Controllers\Admin\UserController::class, 'index'])->name('users.index');
    Route::get('users/create', [\App\Http\Controllers\Admin\UserController::class, 'create'])->name('users.create');
    Route::post('users', [\App\Http\Controllers\Admin\UserController::class, 'store'])->name('users.store');
    Route::get('users/{user}/edit', [\App\Http\Controllers\Admin\UserController::class, 'edit'])->name('users.edit');
    Route::put('users/{user}', [\App\Http\Controllers\Admin\UserController::class, 'update'])->name('users.update');
    Route::delete('users/{user}', [\App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('users.destroy');
    Route::post('users/{user}/toggle-admin', [\App\Http\Controllers\Admin\UserController::class, 'toggleAdmin'])->name('users.toggleAdmin');
});
