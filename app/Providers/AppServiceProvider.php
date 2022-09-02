<?php

namespace App\Providers;

use App\Models\Nation;
use App\Models\Office;
use App\Models\Project;
use App\Models\Partner;
use App\Models\Section;
use App\Models\Setting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        View::share([
            'ofs' => Office::limit(10)->get(),
            'projs' => Project::limit(10)->get(),
            'setting' => Setting::first(),
            'sections' => Section::all(),
            'nations' => Nation::get(),
            'partner'=>Partner::all(),
        ]);
    }
}
