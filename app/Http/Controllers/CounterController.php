<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Counter;
class CounterController extends Controller
{
   public function counterSection(){
    return view('admin.dashboard.counter.counter_section');
   }

   public function viewCounter(){
    $data['counters'] = Counter::all();
    return view('admin.dashboard.counter.counters', $data);
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

   public function editCounter(Request $request, $id){
    $counter = Counter::findOrFail($id);
    $counter_image = $request->file('counter_image');  
    if ($counter_image) {
        $counterImageName = time() . '_counter.' . $counter_image->getClientOriginalExtension();
        $counter_image->move(public_path('admin/counter_image'), $counterImageName);
        $counter->icon = $counterImageName;
    }
    $counter->count = $request->count;
    $counter->label = $request->name;
    if ($counter->save()) {
        return redirect()->back()->with('success', 'Counter updated successfully!');
    } else {
        return redirect()->back()->with('error', 'An error occurred while saving the data.');
    }

   }

   public function destroyCounter($id){
    $counter = Counter::findOrFail($id);
    $imagePath = public_path('admin/counter_image/' . $counter->icon);
    if (file_exists($imagePath)) {
        unlink($imagePath);
    }
    $counter->delete();
    return redirect()->back()->with('success', 'Counter deleted successfully.');
   }
}
