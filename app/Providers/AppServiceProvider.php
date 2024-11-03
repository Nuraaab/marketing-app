<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\SiteData;
use App\Models\Companyfeature;
use App\Models\About;
use App\Models\Service;
use App\Models\Team;
use App\Models\WhyChoosUs;
use App\Models\Portfolio;
use App\Models\Faq;
use App\Models\Counter;
use App\Models\Package;
use App\Models\Testimonial;
use App\Models\Blog;
use App\Models\Brand;
use App\Models\Order;
use App\Models\ContactInfo;
use App\Models\PackageCategory;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Schema; // Add this line

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
    public function boot()
    {
        // Check if the database is connected and the required tables exist
        if (Schema::hasTable('site_data') && Schema::hasTable('about') && Schema::hasTable('why_choos_us')) {
            $siteData = SiteData::first();
            $aboutData = About::first();
            $why_us = WhyChoosUs::all();
            $team = Team::all();
            $counters = Counter::all();
            $companyFeature = Companyfeature::all();
            $images = $siteData ? $siteData->bannerImages : [];
            $services = Service::all();
            $projects = Portfolio::all();
            $testimonials = Testimonial::all();
            $faqs = Faq::all();
            $news = Blog::all();
            $brands = Brand::all();
            $contacts = ContactInfo::first();
            $orders = Order::all();

            // Filter packages based on the `category` query parameter
            $category = Request::query('category', 'all');
            if ($category === 'all') {
                $packages = Package::with('features')->get();
            } else {
                $packages = Package::with('features')->where('category', $category)->get();
            }

            $categories = PackageCategory::all();

            // Share data with all views
            View::share([
                'siteData' => $siteData,
                'images' => $images,
                'companyFeatures' => $companyFeature,
                'aboutData' => $aboutData,
                'services' => $services,
                'teams' => $team,
                'why_us' => $why_us,
                'projects' => $projects,
                'faqs' => $faqs,
                'counters' => $counters,
                'packages' => $packages,  // Filtered packages
                'testimonials' => $testimonials,
                'news' => $news,
                'brands' => $brands,
                'contacts' => $contacts,
                'selectedCategory' => $category,
                'categories' => $categories,
                'orders' => $orders,
            ]);
        }
    }
}
