<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteData;
use App\Models\Package;
use App\Models\Feature;
use App\Models\PackageCategory;
class PackageController extends Controller
{
  public function packageSection(){
    $staticSiteData = SiteData::first();
    $catagories = PackageCategory::all();
    return view('admin.dashboard.pricings.add_package', compact('staticSiteData', 'catagories'));
  }
  public function viewPackage(){
    $packages = Package::all();
    // dd($packages->features);
    $features = Feature::all();

    return view('admin.dashboard.pricings.package', compact('packages', 'features'));
  }

  public function createPackage(Request $request){
    try{

        $site = SiteData::firstOrNew([]);
        $isPopular = "";
        $priceUnit = "";
        $site->package_title = $request->package_title;
        $site->package_subtitle = $request->package_subtitle;
        $icon = $request->package_image;
        $name = $request->name;
        $is_popular = $request->is_popular;
        $desc = $request->desc;
        $price =$request->price;
        $unit =$request->unit;
        $category = $request->category;
        $button_text =$request->button_text;
        $button_url =$request->button_url;
        if($icon || $name || $desc || $price  || $button_text || $button_url){
            if($is_popular == "Yes"){
                $isPopular = '1';
            }else if($is_popular == "No"){
                $isPopular = '0';
            }else{
                $isPopular = '0';
            }
            if($unit = "USD($)"){
                $priceUnit = "$";
            }else if($unit = "ETB"){
                $priceUnit = "ETB";
            }else{
                $priceUnit = "ETB";
            }
            $package = new Package();
            if ($icon) {
                $packageImageName = time() . '_packageImage.' . $icon->getClientOriginalExtension();
                $icon->move(public_path('admin/package_image'), $packageImageName);
                $package->icon = $packageImageName;
            }
            $package->is_popular = $isPopular;
            $package->name = $name;
            $package->desc = $desc;
            $package->price = $price;
            $package->unit = $priceUnit;
            $package->category = $category;
            $package->button_text = $button_text;
            $package->button_url = $button_url;
            if ($package->save() && $site->save()) {
                return redirect()->back()->with('success', 'package and site data added successfully!');
            } else {
                return redirect()->back()->with('error', 'An error occurred while saving the package or site data.');
            }
        }else {
            if ($site->save()) {
                return redirect()->back()->with('success', 'Site data updated successfully!');
            } else {
                return redirect()->back()->with('error', 'An error occurred while saving the site data.');
            }
        }
    }catch (\Exception $e) {
            return redirect()->back()->with('error', 'An Error Occurred!');
        }
  }

  public function packageCat(){
    $categories = PackageCategory::all();
    return view('admin.dashboard.pricings.category', compact('categories'));
  }

  public function createPackageCat(Request $request){
    try{
        $cat = new PackageCategory();
        $cat->name = $request->name;
        if ($cat->save()) {
            return redirect()->back()->with('success', 'Category updated successfully!');
        } else {
            return redirect()->back()->with('error', 'An error occurred while saving the Category.');
        }
    }catch (\Exception $e) {
            return redirect()->back()->with('error', 'An Error Occurred!');
        }
  }

}
