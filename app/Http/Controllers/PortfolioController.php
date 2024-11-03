<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteData;
use App\Models\Portfolio;
use App\Models\ProjectImage;
use App\Models\ProjectCategory;
class PortfolioController extends Controller
{
   public function portfolioSection(){
    $staticSiteData = SiteData::firstOrNew([]);
    $portfolio = Portfolio::all();
    $categories = ProjectCategory::all();
    return view('admin.dashboard.portfolio_section', compact('staticSiteData', 'portfolio', 'categories'));
   }

   public function viewProject(){
    $projects = Portfolio::all();
    return view('admin.dashboard.projects.projects', compact('projects'));
   }

   public function viewCategory(){
    $categories = ProjectCategory::all();
    return view('admin.dashboard.projects.category', compact('categories'));
   }
   public function createProjectCat(Request $request){
    try{
        $cat = new ProjectCategory();
        $cat->category = $request->name;
        if ($cat->save()) {
            return redirect()->back()->with('success', 'Category updated successfully!');
        } else {
            return redirect()->back()->with('error', 'An error occurred while saving the Category.');
        }
    }catch (\Exception $e) {
            return redirect()->back()->with('error', 'An Error Occurred!');
        }
  }

   public function createPortfolio(Request $request)
   {
       $request->validate([
           'portfolio_icon' => 'nullable|image|mimes:jpg,png,svg|max:2048',
           'name' => 'nullable',
           'content' => 'nullable',
           'button_text' => 'nullable',
           'button_url' => 'nullable',
           'portfolio_images.*' => 'nullable|image|mimes:jpg,png,svg|max:2048',
       ]);
   
       try {
           $site = SiteData::firstOrNew([]);
           $site->project_title = $request->portfolio_title;
           $site->project_subtitle = $request->portfolio_subtitle;
   
           $portfolio_icon = $request->file('portfolio_icon');
           $name = $request->project_name;
           $category = $request->category;
           $content = $request->content;
           $address = $request->address;
           $date = $request->date;
           $link = $request->link;
           $client = $request->client_name;
           $button_text = $request->button_text;
           $button_url = $request->button_url;
          
   
           if ($address || $client || $portfolio_icon || $name || $content || $button_text || $button_url) {
               $portfolio = new Portfolio();
   
               // Handle the portfolio icon upload
               if ($portfolio_icon) {
                   $portfolioIconName = time() . '_portfolioIcon.' . $portfolio_icon->getClientOriginalExtension();
                   $portfolio_icon->move(public_path('admin/portfolio_image'), $portfolioIconName);
                   $portfolio->icon = $portfolioIconName;
               }
   
               $portfolio->name = $name;
               $portfolio->desc = $content;
               $portfolio->client = $client;
               $portfolio->address = $address;
               $portfolio->category = $category;
               $portfolio->project_date = $date;
               $portfolio->project_url = $link;
               $portfolio->button_text = $button_text;
               $portfolio->button_url = $button_url;
   
               // Save the portfolio data first
               $portfolio->save();
   
               // Handle portfolio images
               if ($request->hasFile('portfolio_images')) {
                   $firstImagePath = null; // Initialize variable to store the first image path
                   
                   foreach ($request->file('portfolio_images') as $index => $image) {
                       $projectImageName = time() . '_projectImage.' . $image->getClientOriginalExtension();
                       $image->move(public_path('admin/portfolio_image'), $projectImageName);
   
                       // Set the first image to $portfolio->image
                       if ($index === 0) {
                           $firstImagePath = $projectImageName;
                       }
   
                       // Create and save a new ProjectImage for each image
                       $projectImage = new ProjectImage();
                       $projectImage->image = $projectImageName; 
                       $projectImage->portfolio_id = $portfolio->id; // Now this will have a valid ID
                       $projectImage->save();
                   }
   
                   // Set the first image path to the portfolio image field
                   if ($firstImagePath) {
                       $portfolio->image = $firstImagePath; // Set the first image to $portfolio->image
                       $portfolio->save(); // Don't forget to save the portfolio again if you updated the image
                   }
               }
   
               // Save site data
               $site->save(); 
               return redirect()->back()->with('success', 'Portfolio and site data added successfully!');
           } else {
               // Save site data if no portfolio data
               if ($site->save()) {
                   return redirect()->back()->with('success', 'Site data updated successfully!');
               } else {
                   return redirect()->back()->with('error', 'An error occurred while saving the site data.');
               }
           }
       } catch (\Exception $e) {
           return redirect()->back()->with('error', 'An Error Occurred! ' . $e->getMessage());
       }
   }
   

   
}
