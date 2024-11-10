<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Package;
use App\Models\Portfolio;
use App\Models\Team;
use App\Models\Service;
use App\Models\Contact;
use App\Models\SiteData;
use App\Models\CompanyFeature;
use App\Models\About;
use App\Models\WhyChoosUs;
use App\Models\Faq;
use App\Models\Counter;
use App\Models\Testimonial;
use App\Models\Brand;
use App\Models\Order;
use App\Models\ContactInfo;
use App\Models\PackageCategory;
use Illuminate\Support\Facades\Request;
class FrontController extends Controller
{
    public function home(){
        $siteData = SiteData::first();
        $category = Request::query('category', 'all');
        if ($category === 'all') {
            $packages = Package::with('features')->get();
        } else {
            $packages = Package::with('features')->where('category', $category)->get();
        }
        $categories = PackageCategory::all();
        $data['siteData'] = $siteData;
        $data['contacts'] = ContactInfo::first();
        $data['images'] = $siteData ? $siteData->bannerImages : [];
        $data['companyFeatures'] = CompanyFeature::all();
        $data['aboutData'] = About::first();
        $data['services'] = Service::all();
        $data['teams'] = Team::all();
        $data['why_us'] = WhyChoosUs::all(); 
        $data['projects'] = Portfolio::all();
        $data['faqs'] = Faq::all();
        $data['counters'] = Counter::all();
        $data['testimonials'] = Testimonial::all();
        $data['news'] = Blog::all();
        $data['footer_news'] = Blog::all();
        $data['brands'] = Brand::all();
        $data['selectedCategory'] = $category;
        $data['categories'] = $categories;
        $data['packages'] = $packages;
        return view("front.main-pages.home", $data);
    }

    public function getService(){
        $data['siteData'] = SiteData::first();
        $data['services'] = Service::all();
        $data['footer_news'] = Blog::all();
        $data['contacts'] = ContactInfo::first();
        return view('front.main-pages.service', $data);
    }

    public function getContact(){
        $data['siteData'] = SiteData::first();
        $data['footer_news'] = Blog::all();
        $data['contacts'] = ContactInfo::first();
        return view('front.main-pages.contact', $data);
    }

    public function getProject(){
        $data['siteData'] = SiteData::first();
        $data['projects'] = Portfolio::all();
        $data['testimonials'] = Testimonial::all();
        $data['brands'] = Brand::all();
        $data['footer_news'] = Blog::all();
        $data['contacts'] = ContactInfo::first();
        return view('front.main-pages.project', $data);
    }

    public function getNews(){
        $blogs = Blog::paginate(10);
        $data['siteData'] = SiteData::first();
        $data['blogs'] = $blogs;
        $data['footer_news'] = Blog::all();
        $data['contacts'] = ContactInfo::first();
        return view('front.main-pages.news', $data);
    }

    public function projectDetails($id){
        $projects = Portfolio::find($id);
        $data['siteData'] = SiteData::first();
        $data['footer_news'] = Blog::all();
        $data['contacts'] = ContactInfo::first();
        $data['projects'] = $projects;
        return view('front.main-pages.project_details', $data);
    }

    public function serviceDetails($id){
        $services = Service::find($id);
        $data['siteData'] = SiteData::first();
        $data['footer_news'] = Blog::all();
        $data['contacts'] = ContactInfo::first();
        $data['services'] = $services;
        return view('front.main-pages.service_details', $data);
    }

    public function newsDetails($id){
        $news = Blog::find($id);
        $data['siteData'] = SiteData::first();
        $data['contacts'] = ContactInfo::first();
        $data['footer_news'] = Blog::all();
        $data['news'] = $news;
        return view('front.main-pages.news_details', $data);
    }

    public function teamDetails($id){
        $teams = Team::find($id);
        return view('front.main-pages.team_details', compact('teams'));
    }

    public function getLogin(Request $request){
        $packageId = $request->input('package_id');
        $package = Package::findOrFail($packageId);
        return view('front.main-pages.login', compact('package'));
    }

    public function contact(Request $request){
        try{
            $contact = new Contact();
            $name = $request->name;
            $email = $request->email;
            $phone = $request->phone;
            $subject = $request->subject;
            $message = $request->message;

            $contact->name = $name;
            $contact->email = $email;
            $contact->phone = $request->phone;
            $contact->subject = $request->subject;
            $contact->message = $request->message;
            if ($contact->save()) {
                return redirect()->back()->with('success', 'Contact send successfully! We will contact you soon.');
            } else {
                return redirect()->back()->with('error', 'An error occurred while saving the comment.');
            }

        }catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
}
