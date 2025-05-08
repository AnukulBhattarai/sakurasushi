<?php

namespace App\Providers;

use App\Models\Career;
use App\Models\Categories;
use App\Models\FooterNotice;
use App\Models\Header;
use App\Models\Organization;
use App\Models\Service;
use App\Models\Setting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        View::composer('*', function ($view) {
            $organization = Organization::first();
            $services = Service::where('status', true)->latest()->get();
            $appointment = Setting::where('key', 'appointment')->first();
            $categoriesNav = Categories::with('program')->latest()->get();
            $view->with([
                'organization' => $organization,
                'services' => $services,
                'appointment' => $appointment,
                'categoriesNav' => $categoriesNav,
            ]);
        });
        View::composer(['pages.home'], function ($view) {
            $schoolHeader = Header::where('section', 'school')->first();
            $courseHeader = Header::where('section', 'course')->first();
            $teamHeader = Header::where('section', 'team')->first();
            $testimonialHeader = Header::where('section', 'testimonial')->first();
            $blogHeader = Header::where('section', 'blog')->first();
            $publicationHeader = Header::where('section', 'publication')->first();
            $applyHeader = Header::where('section', 'apply')->first();
            $galleryHeader = Header::where('section', 'gallery')->first();

            $view->with([
                'schoolHeader' => $schoolHeader,
                'courseHeader' => $courseHeader,
                'teamHeader' => $teamHeader,
                'testimonialHeader' => $testimonialHeader,
                'blogHeader' => $blogHeader,
                'publicationHeader' => $publicationHeader,
                'applyHeader' => $applyHeader,
                'galleryHeader' => $galleryHeader,
            ]);
        });
        View::composer(['pages.about'], function ($view) {
            $teamHeader = Header::where('section', 'team')->first();
            $testimonialHeader = Header::where('section', 'testimonial')->first();

            $view->with([
                'teamHeader' => $teamHeader,
                'testimonialHeader' => $testimonialHeader,
            ]);
        });
        View::composer(['pages.contact'], function ($view) {
            $contactHeader = Header::where('section', 'contact')->first();

            $view->with([
                'contactHeader' => $contactHeader,
            ]);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
