<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteData;
use App\Models\Blog;
class BlogController extends Controller
{
    public function blogSection(){
        $staticSiteData = SiteData::first();
        return view('admin.dashboard.blog.blog_section', compact('staticSiteData'));
    }

    public function viewBlog(){
        $data['blogs'] = Blog::all();
        return view('admin.dashboard.blog.blogs', $data);
    }

    public function createBlog(Request $request)
    {
        $request->validate([
            'blog_image' => 'nullable|image|mimes:jpg,png,svg|max:2048',
            'date' => 'nullable',
            'author' => 'nullable',
            'title' => 'nullable',
        ]);
    
        try {
            $site = SiteData::firstOrNew([]);
            $site->blog_title = $request->blog_title;
            $site->blog_subtitle = $request->blog_subtitle;
            $blog_image = $request->file('blog_image');
            $title = $request->title;
            $desc = $request->desc;
            $author = $request->author;
            $date = $request->date;
            $button_text = $request->button_text;
            $button_url = $request->button_url;
            if ($blog_image  || $title || $desc || $button_text || $button_url || $author || $date) {
                $blog = new Blog();
    
                if ($blog_image) {
                    $blogImageName = time() . '_blogImage.' . $blog_image->getClientOriginalExtension();
                    $blog_image->move(public_path('admin/blog_image'), $blogImageName);
                    $blog->image = $blogImageName;
                }
                $blog->title = $title;
                $blog->desc = $desc;
                $blog->date = $date;
                $blog->author = $author;
                $blog->button_text = $button_text;
                $blog->button_url = $button_url;
                if ($blog->save() && $site->save()) {
                    return redirect()->back()->with('success', 'blog and site data added successfully!');
                } else {
                    return redirect()->back()->with('error', 'An error occurred while saving the blog or site data.');
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

    public function editBlog(Request $request, $id){
        $request->validate([
            'blog_image' => 'nullable|image|mimes:jpg,png,svg|max:2048',
            'date' => 'nullable',
            'author' => 'nullable',
            'title' => 'nullable',
        ]);
        try{
            $blog = Blog::findOrFail($id);
            $blog_image = $request->file('blog_image');
            $title = $request->title;
            $desc = $request->desc;
            $author = $request->author;
            $date = $request->date;
            $button_text = $request->button_text;
            $button_url = $request->button_url;
            if ($blog_image) {
                $blogImageName = time() . '_blogImage.' . $blog_image->getClientOriginalExtension();
                $blog_image->move(public_path('admin/blog_image'), $blogImageName);
                $blog->image = $blogImageName;
            }
            $blog->title = $title;
            $blog->desc = $desc;
            $blog->date = $date;
            $blog->author = $author;
            $blog->button_text = $button_text;
            $blog->button_url = $button_url;
            
            if ($blog->save()) {
                return redirect()->back()->with('success', 'blog data updated successfully!');
            } else {
                return redirect()->back()->with('error', 'An error occurred while saving the blog data.');
            }
        }catch (\Exception $e) {
            return redirect()->back()->with('error', 'An Error Occurred!');
        }
    }


    public function destroyBlog($id)
        {
            $blog = Blog::findOrFail($id);
            $imagePath = public_path('admin/blog_image/' . $blog->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
            $blog->delete();
            return redirect()->back()->with('success', 'Blog deleted successfully.');
        }
}
