<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Request;
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
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [
            'localeSessionRedirect',
            'localizationRedirect',
            'localeViewPath',
        ],
    ],
    function () {
        Route::get('/', function () {
            return view('welcome');
        });

        Route::get('/dashboard', function () {
            return view('dashboard');
        })
            ->middleware(['auth', 'verified'])
            ->name('dashboard');

        Route::middleware('auth')->group(function () {
            Route::get('/profile', [ProfileController::class, 'edit'])->name(
                'profile.edit'
            );
            Route::patch('/profile', [
                ProfileController::class,
                'update',
            ])->name('profile.update');
            Route::delete('/profile', [
                ProfileController::class,
                'destroy',
            ])->name('profile.destroy');
        });
    }
);

require __DIR__ . '/auth.php';
