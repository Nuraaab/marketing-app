<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteData;
use App\Models\WhyChoosUs;
class WhyChoosUsController extends Controller
{
   public function whyUs(){
    $staticSiteData = SiteData::firstOrNew([]);
    $whyUsData = WhyChoosUs::all();
    return view('admin.dashboard.why_us_section', compact('staticSiteData', 'whyUsData'));
   }

   public function createWhy(Request $request)
   {
    
       $request->validate([
           'why_image' => 'nullable|image|mimes:jpg,png,svg|max:2048',
           'icon' => 'nullable|image|mimes:jpg,png,svg|max:2048',
           'why_title' => 'nullable|string|max:255',
           'why_subtitle' => 'nullable|string|max:255',
           'why_desc' => 'nullable|string',
           'why_name' => 'nullable|string|max:255',
           'desc' => 'nullable|string',
       ]);
   
       try { 
           $site = SiteData::firstOrNew([]);
           $site->why_choose_us_title = $request->why_title ?? $site->why_choose_us_title;
           $site->why_choose_us_subtitle = $request->why_subtitle ?? $site->why_choose_us_subtitle;
           $site->why_choose_us_description = $request->why_desc ?? $site->why_choose_us_description;
           $why_image = $request->file('why_image');
           if ($why_image) {
               $whyImageName = time() . '_why.' . $why_image->getClientOriginalExtension();
               $why_image->move(public_path('admin/why_image'), $whyImageName);
               $site->why_choose_us_image = $whyImageName;
           }
        
           $hasNewData = $request->icon  || $request->why_name || $request->desc;
            if($hasNewData){
                $why = new WhyChoosUs();
                $why_icon = $request->file('icon');
                if ($why_icon) {
                    $whyIconImageName = time() . '_whyIcon.' . $why_icon->getClientOriginalExtension();
                    $why_icon->move(public_path('admin/why_image'), $whyIconImageName);
                    $why->icon = $whyIconImageName;
                }
                $why->title = $request->why_name;
                $why->desc = $request->desc;
                if ($why->save() && $site->save()) {
                    return redirect()->back()->with('success', 'Why Us and site data added successfully!');
                } else {
                    return redirect()->back()->with('error', 'An error occurred while saving the Why us or site data.');
                }

            }else {
                if ($site->save()) {
                    return redirect()->back()->with('success', 'Site data updated successfully!');
                } else {
                    return redirect()->back()->with('error', 'An error occurred while saving the site data.');
                }
            }
         
           
           
       } catch (\Exception $e) {
           \Log::error($e->getMessage());
           return redirect()->back()->with('error', 'An Error Occurred! Please try again.');
       }
   }
   
}
