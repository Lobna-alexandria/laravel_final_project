<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\welcomeController;
use App\Http\Controllers\FrontSection1Controller;
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
        // Route::get('/', function () {
        //     return view('welcome');
        // });

        Route::get('/', [welcomeController::class, 'showAll'])->name('welcome');
        // Route::get('print/users', [OceanController::class, 'printO']);
        // [UserProfileController::class, 'show']
        // ->middleware(['auth', 'verified', 'GoToDash'])
        // ->name('dashboard');

        Route::middleware(['auth', 'verified', 'GoToDash'])->group(function () {
            Route::get('/dashboard', function () {
                return view('dashboard');
            })->name('dashboard');
            Route::resource('user', userController::class);
            Route::resource('portfolio', FrontSection1Controller::class);
        });

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