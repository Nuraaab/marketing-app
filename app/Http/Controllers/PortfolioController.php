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
    return view('admin.dashboard.projects.portfolio_section', compact('staticSiteData', 'portfolio', 'categories'));
   }

   

   public function viewProject(){
    $data['projects'] = Portfolio::all();
    $data['categories'] = ProjectCategory::all();
    return view('admin.dashboard.projects.projects', $data);
   }

   public function viewCategory(){
    $categories = ProjectCategory::all();
    return view('admin.dashboard.projects.category', compact('categories'));
   }

   public function projectImage(){
    $data['images'] = ProjectImage::all();
    return view('admin.dashboard.projects.project_image', $data);
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
                    // Generate a unique name for each image
                    $uniqueSuffix = uniqid(); // Generates a unique ID
                    $projectImageName = $uniqueSuffix . '_projectImage.' . $image->getClientOriginalExtension();
                    
                    // Move the image to the desired directory
                    $image->move(public_path('admin/portfolio_image'), $projectImageName);
                
                    // Set the first image to $portfolio->image
                    if ($index === 0) {
                        $firstImagePath = $projectImageName;
                    }
                dd($projectImageName);
                    // Create and save a new ProjectImage for each image
                    $projectImage = new ProjectImage();
                    $projectImage->image = $projectImageName;
                    $projectImage->portfolio_id = $portfolio->id; // Ensure this has a valid ID
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

   public function createProjectImage(Request $request)
   {
       try {
               $firstImagePath = null; 
               $project_id = $request->project_id;
   
               // Retrieve the project
               $project = Portfolio::findOrFail($project_id);
   
               foreach ($request->portfolio_images as $index => $image) {
                   // Generate a unique name for each image
                   $uniqueSuffix = uniqid();
                   $projectImageName = $uniqueSuffix . '_projectImage.' . $image->getClientOriginalExtension();
                   
                   // Move the image to the desired directory
                   $image->move(public_path('admin/portfolio_image'), $projectImageName);
   
                   // Set the first image path
                   if ($index === 0) {
                       $firstImagePath = $projectImageName;
                   }
   
                   // Save the project image
                   $projectImage = new ProjectImage();
                   $projectImage->image = $projectImageName;
                   $projectImage->portfolio_id = $project_id; 
                   $projectImage->save();
               }
   
               // If the project has no main image, set the first image as the main image
               if ($firstImagePath && $project->image == null) {
                   $project->image = $firstImagePath;
                   $project->save();
               }
   
               return redirect()->back()->with('success', 'Project images added successfully!');
          
       } catch (\Exception $e) {
           return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
       }
   }
   

   public function editProjectCat(Request $request, $id){
    try{
        $cat = ProjectCategory::findOrFail($id);
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

   public function destroyCategory($id){
    $cat = ProjectCategory::findOrFail($id);
    $cat->delete();
    return redirect()->back()->with('success', 'Project Category deleted successfully.');
   }

   public function destroyProjectImage(Request $request, $id){
    $project_image = ProjectImage::findOrFail($id);
    $project = Portfolio::findOrFail($request->project_id);
//    dd($project->image  , $project_image->image);
    if($project_image->image != $project->image){
        $imagePath = public_path('admin/portfolio_image/' . $project_image->image);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    }
    $project_image->delete();
    return redirect()->back()->with('success', 'Project Image deleted successfully.');

   }
   

   public function editProject(Request $request, $id){
    $request->validate([
        'portfolio_icon' => 'nullable|image|mimes:jpg,png,svg|max:2048',
        'name' => 'nullable',
        'content' => 'nullable',
        'button_text' => 'nullable',
        'button_url' => 'nullable',
    ]);
    try{
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

        $portfolio = Portfolio::findOrFail($id);
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
        if ($portfolio->save()) {
            return redirect()->back()->with('success', 'Portfolio updated successfully!');
        } else {
            return redirect()->back()->with('error', 'An error occurred while saving the portfolio data.');
        }

    }catch (\Exception $e) {
           return redirect()->back()->with('error', 'An Error Occurred! ' . $e->getMessage());
       }

   }

   public function destroyProject($id){
    $project = Portfolio::findOrFail($id);
    $imagePath = public_path('admin/portfolio_image/' . $project->icon);
    if (file_exists($imagePath)) {
        unlink($imagePath);
    }
    $project->delete();
    return redirect()->back()->with('success', 'Project deleted successfully.');
   }
   
}
