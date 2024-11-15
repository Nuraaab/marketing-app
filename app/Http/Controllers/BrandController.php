<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteData;
use App\Models\Brand;
class BrandController extends Controller
{
  public function brandSection(){
    $staticSiteData = SiteData::first();
    return view('admin.dashboard.brand.brand_section', compact('staticSiteData'));
  }

  public function viewBrand(){
    $data['brands'] = Brand::all();
    return view('admin.dashboard.brand.brands', $data);
  }


  public function createBrand(Request $request){
    try{

        $site = SiteData::firstOrNew([]);
        $site->brand_title = $request->brand_title;
        $name = $request->name;
        $image = $request->brand_image;
        if($name || $image){
            $brand = new Brand();
            $brand_image = $request->file('brand_image');
            if ($brand_image) {
                $brandImageName = time() . '_brandImage.' . $brand_image->getClientOriginalExtension();
                $brand_image->move(public_path('admin/brand_image'), $brandImageName);
                $brand->brand_image = $brandImageName;
            }
            $brand->name = $request->name;
            if ($brand->save() && $site->save()) {
                return redirect()->back()->with('success', 'brand and site data added successfully!');
            } else {
                return redirect()->back()->with('error', 'An error occurred while saving the brand or site data.');
            }
        }else {
            if ($site->save()) {
                return redirect()->back()->with('success', 'Site data updated successfully!');
            } else {
                return redirect()->back()->with('error', 'An error occurred while saving the site data.');
            }
        }
    } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An Error Occurred!');
        }
  }

  public function editBrand(Request $request, $id){
    try{
        $name = $request->name;
        $image = $request->brand_image;
        $brand = Brand::findOrFail($id);
        $brand_image = $request->file('brand_image');
        if ($brand_image) {
            $brandImageName = time() . '_brandImage.' . $brand_image->getClientOriginalExtension();
            $brand_image->move(public_path('admin/brand_image'), $brandImageName);
            $brand->brand_image = $brandImageName;
        }
        $brand->name = $request->name;
        if ($brand->save()) {
            return redirect()->back()->with('success', 'brand updated successfully!');
        } else {
            return redirect()->back()->with('error', 'An error occurred while saving the brand data.');
        }

    }catch (\Exception $e) {
            return redirect()->back()->with('error', 'An Error Occurred!');
        }
  }

  public function destroyBrand($id){
    $brand = Brand::findOrFail($id);
    $imagePath = public_path('admin/brand_image/' . $brand->image);
    if (file_exists($imagePath)) {
        unlink($imagePath);
    }
    $brand->delete();
    return redirect()->back()->with('success', 'Brand deleted successfully.');
  }
}
