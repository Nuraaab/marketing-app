<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteData;
use App\Models\CompanyFeature;
class CompanyFeatureController extends Controller
{
   public function companyFeatureSection(){

    $staticSiteData = SiteData::first();
    return view('admin.dashboard.feature.feature_section', compact('staticSiteData'));
   }

   public function viewFeatures(){
    $data['features'] = CompanyFeature::all();
    return view('admin.dashboard.feature.features', $data);
   }

   public function createCompanyFeature(Request $request){
    $request->validate([
        'feature_icon' => 'nullable|image|mimes:jpg,png,svg|max:2048',
        'name' => 'nullable',
        'feature_desc' => 'nullable',
    ]);
    try {
        $site = SiteData::firstOrNew([]);
        $site->feature_title = $request->feature_title;
        $feature_icon = $request->file('feature_icon');
        $name = $request->feature_name;
        $desc = $request->feature_desc;
        if ($feature_icon || $name || $desc) {
            $companyFeature = new CompanyFeature();
            if ($feature_icon) {
                $companyFeatureIconName = time() . '_companyFeatureIcon.' . $feature_icon->getClientOriginalExtension();
                $feature_icon->move(public_path('admin/companyFeature_image'), $companyFeatureIconName);
                $companyFeature->icon = $companyFeatureIconName;
            }

            $companyFeature->name = $name;
            $companyFeature->desc = $desc;
            if ($companyFeature->save() && $site->save()) {
                return redirect()->back()->with('success', 'company Feature and site data added successfully!');
            } else {
                return redirect()->back()->with('error', 'An error occurred while saving the companyFeature or site data.');
            }
        } else {
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

   public function editCompanyFeature(Request $request, $id) {
    $request->validate([
        'feature_icon' => 'nullable|image|mimes:jpg,png,svg|max:2048',
        'name' => 'nullable',
        'feature_desc' => 'nullable',
    ]);
    try {
        $feature_icon = $request->file('feature_icon');
        $name = $request->feature_name;
        $desc = $request->feature_desc;
        $companyFeature = CompanyFeature::find($id);
        if ($feature_icon) {
            $companyFeatureIconName = time() . '_companyFeatureIcon.' . $feature_icon->getClientOriginalExtension();
            $feature_icon->move(public_path('admin/companyFeature_image'), $companyFeatureIconName);
            $companyFeature->icon = $companyFeatureIconName;
        }

        $companyFeature->name = $name;
        $companyFeature->desc = $desc;
        if ($companyFeature->save()) {
            return redirect()->back()->with('success', 'Feature updated successfully!');
        } else {
            return redirect()->back()->with('error', 'An error occurred while updating the feature.');
        }
        

    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'An Error Occurred!');
    }
   }

   public function destroyCompanyFeature($id){
    $feature = CompanyFeature::findOrFail($id);
    $imagePath = public_path('admin/companyFeature_image/' . $feature->icon);
    if (file_exists($imagePath)) {
        unlink($imagePath);
    }
    $feature->delete();
    return redirect()->back()->with('success', 'Feature deleted successfully.');
   }
}
