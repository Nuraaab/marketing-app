<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Carbon\Carbon;
class CommentController extends Controller
{
    public function postComment(Request $request)
    {
        try {
            $comment = new Comment(); 
            $name = $request->user_name;
            $commentText = $request->comment;
            $email = $request->email;
            $blogId = $request->blog;
            $comment_image = $request->file('photo');
            $date = Carbon::now()->toDateString();
            $comment->name = $name;
            $comment->comment = $commentText;
            $comment->email = $email;
            $comment->blog_id = $blogId;
            $comment->date = $date;
            if ($comment_image) {
                $commentImageName = time() . '_comment.' . $comment_image->getClientOriginalExtension();
                $comment_image->move(public_path('admin/comment_image'), $commentImageName);
                $comment->profile = $commentImageName;
            }
            if ($comment->save()) {
                return redirect()->back()->with('success', 'Comment saved successfully!');
            } else {
                return redirect()->back()->with('error', 'An error occurred while saving the comment.');
            }
    
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
    
}
