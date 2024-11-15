<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteData;
use App\Models\Testimonial;
class TestimonialController extends Controller
{
    public function testimonialSection(){
        $staticSiteData = SiteData::firstOrNew([]);
        return view('admin.dashboard.testimonial.testimonial_section', compact('staticSiteData'));
    }

    public function viewTestimonial(){
        $data['testimonials'] = Testimonial::all();
        return view('admin.dashboard.testimonial.testimonials', $data);
    }

    public function createTestimonial(Request $request){
        $request->validate([
            'user_image' => 'nullable|image|mimes:jpg,png,svg|max:2048',
            'image' => 'nullable|image|mimes:jpg,png,svg|max:2048',
        ]);

        try { 
            $site = SiteData::firstOrNew([]);
            $site->testimonial_title = $request->title;
            $site->testimonial_subtitle = $request->subtitle;
            $image = $request->file('image');
            if ($image) {
                $ImageName = time() . '_faq.' . $image->getClientOriginalExtension();
                $image->move(public_path('admin/testimonial_image'), $ImageName);
                $site->testimonial_image = $ImageName;
            }
         
            $hasNewData = $request->name  || $request->role || $request->message ||$image;
             if($hasNewData){
                 $testimonial = new Testimonial();
                 $testimonial->name = $request->name;
                 $testimonial->role = $request->role;
                 $testimonial->message =$request->message;
                 $user_image = $request->file('user_image');
                    if ($user_image) {
                        $userImageName = time() . '_testimonial.' . $user_image->getClientOriginalExtension();
                        $user_image->move(public_path('admin/testimonial_image'), $userImageName);
                        $testimonial->image = $userImageName;
                    }
                 if ($testimonial->save() && $site->save()) {
                     return redirect()->back()->with('success', 'Testimonial and site data added successfully!');
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

    public function editTestimonial(Request $request, $id){
        $request->validate([
            'user_image' => 'nullable|image|mimes:jpg,png,svg|max:2048',
        ]);
        try{
            $testimonial = Testimonial::findOrFail($id);
            $testimonial->name = $request->name;
            $testimonial->role = $request->role;
            $testimonial->message =$request->message;
            $user_image = $request->file('user_image');
            if ($user_image) {
                $userImageName = time() . '_testimonial.' . $user_image->getClientOriginalExtension();
                $user_image->move(public_path('admin/testimonial_image'), $userImageName);
                $testimonial->image = $userImageName;
            }
            if ($testimonial->save()) {
                return redirect()->back()->with('success', 'Testimonial updated successfully!');
            } else {
                return redirect()->back()->with('error', 'An error occurred while saving data.');
            }
        }catch (\Exception $e) {
            return redirect()->back()->with('error', 'An Error Occurred! Please try again.');
        }
    }

    public function destroyTestimonial($id)
{
    $testimonial = Testimonial::findOrFail($id);
    $imagePath = public_path('admin/testimonial_image/' . $testimonial->image);
    if (file_exists($imagePath)) {
        unlink($imagePath);
    }
    $testimonial->delete();
    return redirect()->back()->with('success', 'Testimonial deleted successfully.');
}
}
