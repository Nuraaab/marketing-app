<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteData;
use App\Models\Team;
class TeamController extends Controller
{
   public function teamSection(){
    $staticSiteData = SiteData::first();
        $teamData = Team::first();
    return view('admin.dashboard.team.team_section', compact('staticSiteData', 'teamData'));
   }

   public function viewTeam(){
    $data['teams'] = Team::all();
    return view('admin.dashboard.team.teams', $data);
   }

   public function createTeam(Request $request)
   {
       $request->validate([
           'team_image' => 'image|mimes:jpg,png,svg|max:2048',
           'name' => 'nullable',
           'role' => 'nullable',
       ]);
   
       try {
           $site = SiteData::firstOrNew([]);
           $site->team_title = $request->team_title;
           $site->team_subtitle = $request->team_subtitle;
           $team_image = $request->file('team_image');
           $name = $request->name;
           $role = $request->role;
           $facebook_url = $request->facebook_url;
           $twitter_url = $request->twitter_url;
           $linkedin_url = $request->linkedin_url;
           $github_url = $request->github_url;
           if ($team_image || $name || $role || $facebook_url || $twitter_url || $linkedin_url || $github_url) {
               $team = new Team();
   
               if ($team_image) {
                   $teamImageName = time() . '_teamImage.' . $team_image->getClientOriginalExtension();
                   $team_image->move(public_path('admin/team_image'), $teamImageName);
                   $team->image = $teamImageName;
               }
   
               $team->name = $name;
               $team->role = $role;
               $team->facebook_url = $facebook_url;
               $team->twitter_url = $twitter_url;
               $team->linkedin_url = $linkedin_url;
               $team->github_url = $github_url;
               if ($team->save() && $site->save()) {
                   return redirect()->back()->with('success', 'Team and site data added successfully!');
               } else {
                   return redirect()->back()->with('error', 'An error occurred while saving the team or site data.');
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

   public function editTeam(Request $request, $id){
    $request->validate([
        'team_image' => 'image|mimes:jpg,png,svg|max:2048',
        'name' => 'nullable',
        'role' => 'nullable',
    ]);
    try{
        $team_image = $request->file('team_image');
        $name = $request->name;
        $role = $request->role;
        $facebook_url = $request->facebook_url;
        $twitter_url = $request->twitter_url;
        $linkedin_url = $request->linkedin_url;
        $github_url = $request->github_url;

        $team = Team::findOrFail($id);
       
        if ($team_image) {
            $teamImageName = time() . '_teamImage.' . $team_image->getClientOriginalExtension();
            $team_image->move(public_path('admin/team_image'), $teamImageName);
            $team->image = $teamImageName;
        }

        $team->name = $name;
        $team->role = $role;
        $team->facebook_url = $facebook_url;
        $team->twitter_url = $twitter_url;
        $team->linkedin_url = $linkedin_url;
        $team->github_url = $github_url;
        if ($team->save()) {
            return redirect()->back()->with('success', 'Team updated successfully!');
        } else {
            return redirect()->back()->with('error', 'An error occurred while saving the team data.');
        }

    }catch (\Exception $e) {
           return redirect()->back()->with('error', 'An Error Occurred!');
       }
   }

   public function destroyTeam($id){
    $team = Team::findOrFail($id);
    $imagePath = public_path('admin/team_image/' . $team->image);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    $team->delete();
    return redirect()->back()->with('success', 'Team deleted successfully.');
   }
   
}
