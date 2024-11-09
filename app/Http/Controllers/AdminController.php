<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteData;
use App\Models\BannerImage;
use App\Models\Order;
class AdminController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }
    public function dashboard(){
        
        $data['siteData'] = SiteData::first();
        $data['orders'] = Order::all();
        return view('admin.dashboard.index', $data);
    }
    public function staticSection()
{
    $staticSiteData = SiteData::first();
    if ($staticSiteData) {
        $images = $staticSiteData->bannerImages;
    } else {
        $images = [];
    }
    return view('admin.dashboard.static_section', compact('staticSiteData', 'images'));
}



        public function createTopData(Request $request){

            $request->validate([
                'logo' => 'image|mimes:jpg,png,svg|max:2048',
                'banner' => 'image|mimes:jpg,png,svg|max:2048',
                'banner_title' => 'nullable',
                'banner_subtitle' => 'nullable',
            ]);
            try{
            $site = SiteData::firstOrNew([]);
            $bannerImage = new BannerImage();
            $logo = $request->file('logo');
            $footer_logo = $request->file('footer_logo');
            $footer_desc = $request->footer_desc;
            $newsletter_title = $request->newsletter_title;
            $newsletter_subtitle = $request->newsletter_subtitle;
            $copyright_text = $request->copyright_text;
            $cta_title = $request->cta_title;
            $cta_subtitle = $request->cta_subtitle;
            $facebook_url = $request->facebook_url;
            $twitter_url = $request->twitter_url;
            $youtube_url = $request->youtube_url;
            $linkden_url = $request->linkden_url;
            $cta_image = $request->file('cta_image');

           
            
            if ($logo) {
                $logoImageName = time() . '_logo.' . $logo->getClientOriginalExtension();
                $logo->move(public_path('admin/logo'), $logoImageName);
                $site->header_logo = $logoImageName;
            
            }

            if ($footer_logo) {
                $footer_logoImageName = time() . '_footer_logo.' . $footer_logo->getClientOriginalExtension();
                $footer_logo->move(public_path('admin/logo'), $footer_logoImageName);
                $site->footer_logo = $footer_logoImageName;
            
            }

            if ($cta_image) {
                $cta_imageImageName = time() . '_cta_image.' . $cta_image->getClientOriginalExtension();
                $cta_image->move(public_path('admin/cta_image'), $cta_imageImageName);
                $site->cta_image = $cta_imageImageName;
            
            }

            $site->banner_title = $request->banner_title;
            $site->banner_sub_title = $request->banner_subtitle;
            $site->banner_button_name = $request->banner_button_name;
            $site->banner_button_url = $request->banner_button_url;
            $site->banner_video_button = $request->banner_video_button_name;
            $site->banner_video_url = $request->banner_video_button_url;
            $site->cta_title = $cta_title;
            $site->cta_subtitle = $cta_subtitle;
            $site->footer_desc = $footer_desc;
            $site->newsletter_title = $newsletter_title;
            $site->newsletter_subtitle = $newsletter_subtitle;
            $site->facebook_url = $facebook_url;
            $site->youtube_url = $youtube_url;
            $site->twitter_url = $twitter_url;
            $site_linkden_url =$linkden_url;
            $site->copyright_text = $copyright_text;
            if($site->save()){
                $banner = $request->file('banner');
                if ($banner) {
                    $bannerImageName = time() . '_banner.' . $banner->getClientOriginalExtension();
                    $banner->move(public_path('admin/banner'), $bannerImageName);
                    $bannerImage->banner_image = $bannerImageName;
                    $bannerImage->site_data_id = $site->id;
                    if($bannerImage->save()){
                        return redirect()->back()->with('success', 'Top Section and Banner Image added successfully!');
                    }else{
                        return redirect()->back()->with('error', 'An error occurred while saving the Images.');
                    }
                    
                }else{
                    return redirect()->back()->with('success', 'Top Section added successfully!');
                }
            }else{
                return redirect()->back()->with('error', 'An error occurred while saving the data.');
            }
        }catch (\Exception $e) {
            \Log::error($e->getMessage());
            return redirect()->back()->with('error', 'An Error Occurred!');
        }
           
        }






        public function featureSection()
        {
            $staticSiteData = SiteData::first();
            return view('admin.dashboard.feature_section', compact('staticSiteData'));
            
            // $images = $staticSiteData->bannerImages;
            // // dd($images);
            
            // return view('admin.dashboard.static_section', compact('staticSiteData', 'images'));
        }


        public function uploadLogo(Request $request)
        {
            // Validate the file input
            $request->validate([
                'logo' => 'required|image|mimes:jpeg,png,jpg|max:2048', // max size: 2MB
            ]);
        
            // Check if file is present
            if ($request->hasFile('logo')) {
                // Get the file
                $file = $request->file('logo');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                
                // Move the file to the 'logo' directory
                $file->move(public_path('logo'), $filename);
        
                // Save the file name in the database (assuming you have a `SiteData` table)
                $siteData = SiteData::first();
                if ($siteData) {
                    $siteData->header_logo = $filename;
                    $siteData->save();
                } else {
                    SiteData::create(['header_logo' => $filename]);
                }
        
                // Return to the form with a success message
                return back()->with('success', 'Logo uploaded successfully!');
            }
        
            // If no file was uploaded, return an error
            return back()->withErrors(['logo' => 'Please select a valid image file.']);
        }


        public function createTopSection(Request $request)
        {
            $validatedData = $request->validate([
                'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',  // Optional, but must be a valid image if present
                'banner' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Optional, but must be a valid image if present
                'banner_title' => 'required|string|max:255',
                'banner_subtitle' => 'required|string|max:255',
                'banner_button_name' => 'required|string|max:255',
                'banner_button_url' => 'required|url|max:255',
                'banner_video_button_name' => 'nullable|string|max:255',
                'banner_video_button_url' => 'nullable|url|max:255',
            ]);
            dd($top_sec);
            try {
                $top_sec =  SiteData::firstOrNew([]);
                dd($top_sec);
                if ($request->hasFile('logo')) {
                    $logo_image = $request->file('logo');
                    $logoImageName = time() . '.' . $logo_image->getClientOriginalExtension();
                    $logo_image->move(public_path('logo'), $logoImageName);
                    $top_sec->header_logo = $logoImageName;
                }
        
                $top_sec->banner_title = $validatedData['banner_title'];
                $top_sec->banner_sub_title = $validatedData['banner_subtitle'];
                $top_sec->banner_button_name = $validatedData['banner_button_name'];
                $top_sec->banner_button_url = $validatedData['banner_button_url'];
                $top_sec->banner_video_button = $request->banner_video_button_name ?? null;
                $top_sec->banner_video_url = $request->banner_video_button_url ?? null;    
                if (!$top_sec->save()) {
                    return redirect()->back()->withErrors(['message' => 'Failed to save top section data. Please try again.']);
                }
    
                if ($request->hasFile('banner')) {
                    dd($banner);
                    $banner = $request->file('banner');
                    $bannerImageName = time() . '.' . $banner->getClientOriginalExtension();
                    $banner->move(public_path('banner'), $bannerImageName);
                    $bannerImage = new BannerImage();
                    $bannerImage->banner_image = $bannerImageName;
                    $bannerImage->site_data_id = $top_sec->id;
        
                    if (!$bannerImage->save()) {
                        return redirect()->back()->withErrors(['message' => 'Failed to save banner image. Please try again.']);
                    }
                }
                return redirect()->back()->with(['message' => 'Top Data added successfully!']);
        
            } catch (\Exception $e) {
                return redirect()->back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
            }
        }
        
        public function updateTopSection(Request $request, $id){
            $top_sec = SiteData::find($id);
            $bannerImage = new BannerImage();
        
        // If not found, create a new instance
        if (!$top_sec) {
            $top_sec = new SiteData();
        }
        $logo_image = $request->logo;
        if ($logo_image) {
            $logoImageName = time() . '.' . $logo_image->getClientOriginalExtension();
            $logo_image->move('logo', $logoImageName);
            $top_sec->header_logo = $logoImageName;
        }
    
        // Handle banner images
        $banner = $request->file('banner');
            dd($banner);
            if ($banner) {
                $bannerImageName = time() . '.' . $banner->getClientOriginalExtension();
                $banner->move('banner', $bannerImageName);
                $bannerImage->banner_image = $bannerImageName;
                $bannerImage->site_data_id = $top_sec->id;
                $bannerImage->save();
            }
        $top_sec->banner_title = $request->banner_title;
        $top_sec->banner_sub_title = $request->banner_subtitle;
        $top_sec->banner_button_name = $request->banner_button_name;
        $top_sec->banner_button_url = $request->banner_button_url;
        $top_sec->banner_video_button = $request->banner_video_button_name;
        $top_sec->banner_video_url = $request->banner_video_button_url;
        $top_sec->save();
        return redirect()->back()->with(['message' => 'Top  Data added successfully!']);
        }
    public function createStaticSection(Request $request)
{
    $static_sec = new SiteData();
    $logo_image = $request->logo;
    if ($logo_image) {
        $logoImageName = time() . '.' . $logo_image->getClientOriginalExtension();
        $logo_image->move('logo', $logoImageName);
        $static_sec->header_logo = $logoImageName;
    }

    // Handle banner images
    $banners = $request->file('banner_image');
    $bannerImageNames = [];
    if ($banners) {
        foreach ($banners as $banner) {
            $bannerImageName = time() . '-' . $banner->getClientOriginalName();
            $banner->move('banner', $bannerImageName);
            $bannerImageNames[] = $bannerImageName;
            $images = new BannerImage();
        $images->banner_image = $bannerImageName;
        $images->site_data_id = $static_sec->id; // Make sure to save with the correct ID
        $images->save();
        }
        
        // Create a new BannerImage instance and save
        
    }

    // Update or set other fields
    $static_sec->banner_title = $request->banner_title;
    $static_sec->banner_sub_title = $request->banner_subtitle;
    $static_sec->banner_button_name = $request->banner_button_name;
    $static_sec->banner_button_url = $request->banner_button_url;
    $static_sec->banner_video_button = $request->banner_video_button_name;
    $static_sec->banner_video_url = $request->banner_video_button_url;
    $static_sec->feature_title = $request->feature_title;
    $static_sec->brand_title = $request->brand_title;
    $static_sec->about_title = $request->about_title;
    $static_sec->service_title = $request->service_title;
    $static_sec->service_subtitle = $request->service_subtitle;
    $static_sec->why_choose_us_title = $request->wcu_title;
    $static_sec->why_choose_us_subtitle = $request->wcu_subtitle;
    $static_sec->why_choose_us_description = $request->wcu_desc;

    // Handle 'Why Choose Us' image upload
    $wcu = $request->why_choose_us_image;
    if ($wcu) {
        $wcuImageName = time() . '.' . $wcu->getClientOriginalExtension();
        $wcu->move('Why_choose_us', $wcuImageName);
        $static_sec->why_choose_us_image = $wcuImageName;
    }

    $static_sec->project_title = $request->project_title;
    $static_sec->project_subtitle = $request->project_subtitle;
    $static_sec->team_title = $request->team_title;
    $static_sec->team_subtitle = $request->team_subtitle;
    $static_sec->package_title = $request->package_title;
    $static_sec->package_subtitle = $request->package_subtitle;
    $static_sec->faq_title = $request->faq_title;
    $static_sec->faq_subtitle = $request->faq_subtitle;

    // Handle FAQ image upload
    $faq = $request->faq_image;
    if ($faq) {
        $faqImageName = time() . '.' . $faq->getClientOriginalExtension();
        $faq->move('faq', $faqImageName);
        $static_sec->faq_image = $faqImageName;
    }

    $static_sec->testimonial_title = $request->testimonial_title;
    $static_sec->testimonial_subtitle = $request->testimonial_subtitle;

    // Handle testimonial image upload
    $testimonial = $request->testimonial_image;
    if ($testimonial) {
        $testimonialImageName = time() . '.' . $testimonial->getClientOriginalExtension();
        $testimonial->move('testimonial', $testimonialImageName);
        $static_sec->testimonial_image = $testimonialImageName;
    }

    // Save the static section data
    $static_sec->blog_title = $request->blog_title;
    $static_sec->blog_subtitle = $request->blog_subtitle;
    $static_sec->save(); // Save either updated or new data

    return redirect()->back()->with(['message' => 'Static Data added successfully!']);

}

    public function updateStaticSection(Request $request, $id)
    {
        // Attempt to find existing SiteData by ID
        $static_sec = SiteData::find($id);
        
        // If not found, create a new instance
        if (!$static_sec) {
            $static_sec = new SiteData();
        }
    
        // Handle logo image upload
        $logo_image = $request->logo;
        if ($logo_image) {
            $logoImageName = time() . '.' . $logo_image->getClientOriginalExtension();
            $logo_image->move('logo', $logoImageName);
            $static_sec->header_logo = $logoImageName;
        }
    
        // Handle banner images
        $banners = $request->file('banner_image');
        $bannerImageNames = [];
        if ($banners) {
            foreach ($banners as $banner) {
                $bannerImageName = time() . '-' . $banner->getClientOriginalName();
            $banner->move('banner', $bannerImageName);
            $bannerImageNames[] = $bannerImageName;
            $images = new BannerImage();
        $images->banner_image = $bannerImageName;
        $images->site_data_id = $static_sec->id; // Make sure to save with the correct ID
        $images->save();
            }
            
        }
    
        // Update or set other fields
        $static_sec->banner_title = $request->banner_title;
        $static_sec->banner_sub_title = $request->banner_subtitle;
        $static_sec->banner_button_name = $request->banner_button_name;
        $static_sec->banner_button_url = $request->banner_button_url;
        $static_sec->banner_video_button = $request->banner_video_button_name;
        $static_sec->banner_video_url = $request->banner_video_button_url;
        $static_sec->feature_title = $request->feature_title;
        $static_sec->brand_title = $request->brand_title;
        $static_sec->about_title = $request->about_title;
        $static_sec->service_title = $request->service_title;
        $static_sec->service_subtitle = $request->service_subtitle;
        $static_sec->why_choose_us_title = $request->wcu_title;
        $static_sec->why_choose_us_subtitle = $request->wcu_subtitle;
        $static_sec->why_choose_us_description = $request->wcu_desc;
    
        // Handle 'Why Choose Us' image upload
        $wcu = $request->why_choose_us_image;
        if ($wcu) {
            $wcuImageName = time() . '.' . $wcu->getClientOriginalExtension();
            $wcu->move('Why_choose_us', $wcuImageName);
            $static_sec->why_choose_us_image = $wcuImageName;
        }
    
        $static_sec->project_title = $request->project_title;
        $static_sec->project_subtitle = $request->project_subtitle;
        $static_sec->team_title = $request->team_title;
        $static_sec->team_subtitle = $request->team_subtitle;
        $static_sec->package_title = $request->package_title;
        $static_sec->package_subtitle = $request->package_subtitle;
        $static_sec->faq_title = $request->faq_title;
        $static_sec->faq_subtitle = $request->faq_subtitle;
    
        // Handle FAQ image upload
        $faq = $request->faq_image;
        if ($faq) {
            $faqImageName = time() . '.' . $faq->getClientOriginalExtension();
            $faq->move('faq', $faqImageName);
            $static_sec->faq_image = $faqImageName;
        }
    
        $static_sec->testimonial_title = $request->testimonial_title;
        $static_sec->testimonial_subtitle = $request->testimonial_subtitle;
    
        // Handle testimonial image upload
        $testimonial = $request->testimonial_image;
        if ($testimonial) {
            $testimonialImageName = time() . '.' . $testimonial->getClientOriginalExtension();
            $testimonial->move('testimonial', $testimonialImageName);
            $static_sec->testimonial_image = $testimonialImageName;
        }
    
        // Save the static section data
        $static_sec->blog_title = $request->blog_title;
        $static_sec->blog_subtitle = $request->blog_subtitle;
        $static_sec->save(); // Save either updated or new data
    
        return redirect()->back()->with(['message' => 'Static Data added successfully!']);
    }
    
}
