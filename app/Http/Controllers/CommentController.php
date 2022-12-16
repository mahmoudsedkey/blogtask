<?php

namespace App\Http\Controllers;

use App\Models\Comment;

class CommentController extends Controller
{
    public function show($post_id){
        $comments=Comment::where('post_id',$post_id)->get();
        return view('admin.comments.show',compact('comments'));
    }

    

    public function delete($id){
        $comnmet=Comment::find($id);
        $comnmet->delete();
        return redirect()->route('post.index')->with('success','comments delete successfully');
    }
}
