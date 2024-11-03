<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feature;
use App\Models\Package;
class FeatureController extends Controller
{
   public function featureSection(){
    $packages = Package::all();
    return view('admin.dashboard.pricings.add_features', compact('packages'));
   }

//    public function viewFeature(){
//     $features = Feature::all();
//     // dd($feature->packages);
//     $packages = Package::all();
//     foreach ($features as $feature) {
//         dd($feature->packages); // This will dump and die showing the related package for each feature
//     }
//     return view('admin.dashboard.pricings.features', compact('features', 'packages'));
//    }

public function viewFeature()
{
    $features = Feature::with('package')->get(); 
    $packages = Package::all();
    return view('admin.dashboard.pricings.features', compact('features', 'packages'));
}

   public function createFeature(Request $request){
    try{
        $feature = new Feature();
        $feature->name = $request->name;
        $feature->package_id = $request->package;
        $feature->status = $request->status;
        if ($feature->save()) {
            return redirect()->back()->with('success', 'Feature updated successfully!');
        } else {
            return redirect()->back()->with('error', 'An error occurred while saving the site data.');
        }
    }catch (\Exception $e) {
            return redirect()->back()->with('error', 'An Error Occurred!');
        }
   }


   public function assignFeature(Request $request)
   {
       try {
           $package_id = $request->package;
           $feature_id = $request->feature;
           $status = $request->status;
           $package = Package::find($package_id);
           $feature = Feature::find($feature_id);
           if (!$package || !$feature) {
               return redirect()->back()->with('error', 'Invalid package or feature selected.');
           }
           $package->features()->attach($feature->id, ['status' => $status]);
           return redirect()->back()->with('success', 'Feature successfully assigned to the package.');
           
       } catch (\Exception $e) {
           return redirect()->back()->with('error', 'An error occurred while assigning the feature: ' . $e->getMessage());
       }
   }
   
}
