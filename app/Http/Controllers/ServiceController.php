<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\SiteData;
class ServiceController extends Controller
{
    public function serviceSection(){
        $staticSiteData = SiteData::first();
        $serviceData = Service::first();
        return view('admin.dashboard.service_section', compact('staticSiteData', 'serviceData'));
    }

    public function createService(Request $request)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpg,png,svg|max:2048',
            'icon' => 'nullable|image|mimes:jpg,png,svg|max:2048',
            'name' => 'nullable',
            'content' => 'nullable',
            'button_text' => 'nullable',
            'button_url' => 'nullable',
        ]);
    
        try {
            $site = SiteData::firstOrNew([]);
            $site->service_title = $request->service_title;
            $site->service_subtitle = $request->service_subtitle;
            $service_image = $request->file('service_image');
            $service_icon = $request->file('service_icon');
            $name = $request->name;
            $content = $request->content;
            $button_text = $request->button_text;
            $button_url = $request->button_url;
            if ($service_image || $service_icon || $name || $content || $button_text || $button_url) {
                $service = new Service();
    
                if ($service_image) {
                    $serviceImageName = time() . '_serviceImage.' . $service_image->getClientOriginalExtension();
                    $service_image->move(public_path('admin/service_image'), $serviceImageName);
                    $service->image = $serviceImageName;
                }
    
                if ($service_icon) {
                    $serviceIconName = time() . '_serviceIcon.' . $service_icon->getClientOriginalExtension();
                    $service_icon->move(public_path('admin/service_image'), $serviceIconName);
                    $service->icon = $serviceIconName;
                }
    
                $service->name = $name;
                $service->content = $content;
                $service->button_text = $button_text;
                $service->button_url = $button_url;
                if ($service->save() && $site->save()) {
                    return redirect()->back()->with('success', 'Service and site data added successfully!');
                } else {
                    return redirect()->back()->with('error', 'An error occurred while saving the service or site data.');
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
    
}
