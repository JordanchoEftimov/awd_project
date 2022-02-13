<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// public routes
Route::get('/', function () {
    return Inertia::render('Homepage');
})->name('homepage');

// routes for guests (not authenticated users)
Route::middleware('guest')->group(function () {
    Route::get('/sign-up', [AuthController::class, 'show_sign_up'])->name('show_sign_up');
    Route::post('/sign-up', [AuthController::class, 'sign_up'])->name('sign_up');

    Route::get('/sign-in', [AuthController::class, 'show_sign_in'])->name('show_sign_in');
    Route::post('/sign-in', [AuthController::class, 'sign_in'])->name('sign_in');
});

// routes for authenticated users
Route::middleware('auth')->group(function () {
    Route::post('/sign-out', [AuthController::class, 'sign_out'])->name('sign_out');

    Route::get('/my-videos', function () {
        return Inertia::render('Video/Index');
    })->name('videos.index');

    Route::get('/create-video', function () {
        return Inertia::render('Video/Create');
    })->name('videos.create');
});
