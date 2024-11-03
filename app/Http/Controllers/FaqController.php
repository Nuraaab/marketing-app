<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteData;
use App\Models\Faq;
class FaqController extends Controller
{
   public function faqSection(){
    $staticSiteData = SiteData::firstOrNew([]);
    $faqData = Faq::all();
    return view('admin.dashboard.faq_section', compact('staticSiteData', 'faqData'));
   }

   public function createFaq(Request $request){
    $request->validate([
        'faq_image' => 'nullable|image|mimes:jpg,png,svg|max:2048',
      
    ]);

    try { 
        $site = SiteData::firstOrNew([]);
        $site->faq_title = $request->faq_title;
        $site->faq_subtitle = $request->faq_subtitle;
        $site->faq_video_url = $request->faq_video;
        $faq_image = $request->file('faq_image');
        if ($faq_image) {
            $faqImageName = time() . '_faq.' . $faq_image->getClientOriginalExtension();
            $faq_image->move(public_path('admin/faq_image'), $faqImageName);
            $site->faq_image = $faqImageName;
        }
     
        $hasNewData = $request->answer  || $request->question;
         if($hasNewData){
             $faq = new Faq();
             $faq->question = $request->question;
             $faq->answer = $request->answer;
             if ($faq->save() && $site->save()) {
                 return redirect()->back()->with('success', 'FAQs and site data added successfully!');
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
