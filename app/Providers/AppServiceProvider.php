<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Carbon\Carbon;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        config(['app.locale' => 'id']);
        Carbon::setLocale('id');

        Blade::directive('dateID', function ( $expression ) { 
            return "<?php echo \Carbon\Carbon::parse(" . $expression . ")->locale('id')->isoFormat('dddd, D MMMM Y'); ?>";
        });

        Blade::directive('rupiah', function ( $expression ) { 
            return "Rp. <?php echo number_format(" . $expression . ",0,',','.'); ?>";
        });
    }
}
