<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteData;
use App\Models\About;
class AboutController extends Controller
{
    public function aboutSection(){
        $staticSiteData = SiteData::first();
        $aboutData = About::first();
        return view('admin.dashboard.about_section', compact('staticSiteData', 'aboutData'));
    }


    public function createAbout(Request $request){
        $request->validate([
            'about_image' => 'image|mimes:jpg,png,svg|max:2048',
            'quote_image' => 'image|mimes:jpg,png,svg|max:2048',
        ]);
        try{
            $site = SiteData::firstOrNew([]);
            $about =  About::firstOrNew([]);
            $site->about_title = $request->about_title;
            $about_image = $request->file('about_image');
            $quote_image = $request->file('about_quote_image');
            
            if ($about_image) {
                $aboutImageName = time() . '_about.' . $about_image->getClientOriginalExtension();
                $about_image->move(public_path('admin/about_image'), $aboutImageName);
                $about->about_image = $aboutImageName;
            
            }
            
            if ($quote_image) {
                $quoteImageName = time() . '_quote.' . $quote_image->getClientOriginalExtension();
                $quote_image->move(public_path('admin/about_image'), $quoteImageName);
                $about->quote_image = $quoteImageName;
            }
            
           
            $about->subtitle = $request->about_subtitle;
            $about->normal_text = $request->normal_text;
            $about->highlighted_text = $request->highlighted_text;

           
            
            $about->content = $request->about_content;
            
            $about->about_button_name = $request->about_button_name;
            $about->about_button_url = $request->about_button_url;
            
            $about->project_completed = $request->completed_project;
            $about->years_of_experience = $request->years_of_experiance;
           
            if ($about->save() && $site->save()) {
                return redirect()->back()->with('success', 'About added successfully!');
            } else {
                return redirect()->back()->with('error', 'An error occurred while saving the data.');
            }

        }catch (\Exception $e) {
            \Log::error($e->getMessage());
            return redirect()->back()->with('error', 'An Error Occurred!');
        }
       

    }
}
