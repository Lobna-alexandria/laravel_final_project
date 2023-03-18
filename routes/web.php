<?php

use App\Models\CreativeWork;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\welcomeController;
use App\Http\Controllers\WorkingController;
use App\Http\Controllers\UserAboutController;
use App\Http\Controllers\MultiImageController;
use App\Http\Controllers\servDetailsController;
use App\Http\Controllers\CreativeWorkController;
use App\Http\Controllers\FrontSection1Controller;
use App\Http\Controllers\ServeMultiIconController;
use App\Http\Controllers\CreativeWorkImageController;
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

        Route::get('about', [AboutController::class, 'about'])->name('about');
        Route::get('servDetails', [
            servDetailsController::class,
            'DService',
        ])->name('servDetails');
        Route::get('contact', [ContactController::class, 'contact'])->name(
            'contact'
        );

        Route::middleware(['auth', 'verified', 'GoToDash'])->group(function () {
            Route::get('/dashboard', function () {
                return view('dashboard');
            })->name('dashboard');
            Route::resource('user', userController::class);
            Route::resource('portfolio', FrontSection1Controller::class);
            Route::resource('Dabout', UserAboutController::class);
            Route::resource('MultiImage', MultiImageController::class);
            Route::resource('skill', SkillController::class);
            Route::resource('service', ServiceController::class);
            Route::resource('work', WorkingController::class);
            Route::resource('ServeMultiIcon', ServeMultiIconController::class);
            Route::resource('CreativeWork', CreativeWorkController::class);

            Route::resource(
                'CreativeWorkImg',
                CreativeWorkImageController::class
            );
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
