<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteData;
use App\Models\ContactInfo;
use App\Models\Blog;
use App\Models\About;
use App\Models\Testimonial;
use App\Models\Service;
class FrontAboutController extends Controller
{
   public function getAbout(){
      $data['siteData'] = SiteData::first();
      $data['contacts'] = ContactInfo::first();
      $data['aboutData'] = About::first();
      $data['servcies'] = Service::all();
      $data['testimonials'] = Testimonial::all();
      $data['footer_news'] = Blog::all();
    return view('front.main-pages.about', $data);
   }
}
