<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Package;
use App\Models\Portfolio;

class FrontController extends Controller
{
    public function home(){
        return view("front.main-pages.home");
    }

    public function getService(){
        return view('front.main-pages.service');
    }

    public function getContact(){
        return view('front.main-pages.contact');
    }

    public function getProject(){
        return view('front.main-pages.project');
    }

    public function getNews(){
        $blogs = Blog::paginate(10);
        return view('front.main-pages.news', compact('blogs'));
    }

    public function projectDetails($id){
        $projects = Portfolio::find($id);
        return view('front.main-pages.project_details', compact('projects'));
    }

    public function getLogin(Request $request){
        $packageId = $request->input('package_id');
        $package = Package::findOrFail($packageId);
        return view('front.main-pages.login', compact('package'));
    }
}
