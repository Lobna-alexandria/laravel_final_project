<?php

namespace App\Providers;

use image;
use App\Models\Working;
use App\Models\UserAbout;
use App\Models\MultiImage;
use App\Models\CreativeWork;
use App\Models\Creative_Work_image;
use Illuminate\Http\Request;
use App\Models\FrontSection1;
use App\Models\ServeMultiIcon;
use Illuminate\Support\Facades\Route;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     *
     * @return void
     */
    public function boot()
    {
        Route::model('portfolio', FrontSection1::class); // لربط الموديل باسم اراوت لانهم مش نفس الاسم
        Route::model('Dabout', UserAbout::class);
        Route::model('MultiImage', MultiImage::class);
        Route::model('work', Working::class);
        Route::model('ServeMultiIcon', ServeMultiIcon::class);
      
        Route::model('CreativeWork', CreativeWork::class);
        Route::model('CreativeWorkImg', Creative_Work_image::class);

        $this->configureRateLimiting();

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }
}