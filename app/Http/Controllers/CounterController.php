<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Counter;
class CounterController extends Controller
{
   public function counterSection(){
    return view('admin.dashboard.counter_section');
   }

   public function createCounter(Request $request){
      try{
        $counter = new Counter();
        $counter_image = $request->file('counter_image');  
        if ($counter_image) {
            $counterImageName = time() . '_counter.' . $counter_image->getClientOriginalExtension();
            $counter_image->move(public_path('admin/counter_image'), $counterImageName);
            $counter->icon = $counterImageName;
        }
        $counter->count = $request->count;
        $counter->label = $request->name;
        if ($counter->save()) {
            return redirect()->back()->with('success', 'Counter added successfully!');
        } else {
            return redirect()->back()->with('error', 'An error occurred while saving the data.');
        }

      }catch (\Exception $e) {
            return redirect()->back()->with('error', 'An Error Occurred!');
        }
   }
}
