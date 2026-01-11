<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::preventLazyLoading(); {
            // // 2. TAMBAHKAN LOGIKA INI DI SINI
            // if (env('APP_ENV') !== 'local') {
            //     URL::forceScheme('https');
            // }

            // // ATAU, JIKA KODE DI ATAS TIDAK EFEK DI LOCAL, PAKAI YANG INI (LEBIH AGRESIF):
            // // if($this->app->environment('production') || !empty($_SERVER['HTTPS']) || isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {
            // URL::forceScheme('https');
            // }
        }
    }
}
