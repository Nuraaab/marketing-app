<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactInfo;
class ContactInfoController extends Controller
{
   public function contactSection(){
    $contactData = ContactInfo::first();
    return view('admin.dashboard.contact_section', compact('contactData'));
   }

   public function createContact(Request $request)
   {
       try {
           // Validate the incoming request data
           $request->validate([
               'contact_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
         ]);
   
           // Create or update the contact
           $contact = ContactInfo::firstOrNew([]);
   
           // Set the contact fields from the request
           $contact->top_title = $request->top_title;
           $contact->top_subtitle = $request->top_subtitle;
           $contact->top_desc = $request->top_desc;
           $contact->title = $request->title;
           $contact->subtitle = $request->subtitle;
           $contact->email = $request->email;
           $contact->phone = $request->phone;
           $contact->adress = $request->address;
           $contact->map_link = $request->map_link;
           $contact->button_text = $request->button_text;
           $contact->button_url = $request->button_url;
           if ($request->hasFile('contact_image')) {
               $contact_image = $request->file('contact_image');
               $contactImageName = time() . '_contactImage.' . $contact_image->getClientOriginalExtension();
               $contact_image->move(public_path('admin/contact_image'), $contactImageName);
               $contact->image = $contactImageName;
           }
   
           
           if ($contact->save()) {
               return redirect()->back()->with('success', 'Contact and site data added successfully!');
           } else {
               return redirect()->back()->with('error', 'An error occurred while saving the contact or site data.');
           }
   
       } catch (\Exception $e) {
           // Log the error for debugging
           \Log::error($e->getMessage());
           return redirect()->back()->with('error', 'An Error Occurred!');
       }
   }
   
}
