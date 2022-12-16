<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Interactive;
use Illuminate\Http\Request;
use App\Models\Post;
use Exception;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    public function index(){

        $post=Post::first();
        //return $post;
        return view('blog',compact('post'));

    }

    public function comment(Request $request){
        try{
            DB::beginTransaction();
                $user_id=Interactive::insertGetId(['username'=>$request->username]);

                $comnmet=Comment::create(['post_id'=>$request->postId,'user_id'=>$user_id,'content'=>$request->content]);
         
            DB::commit();

            return redirect()->route('blog');

        }
        catch(Exception $ex){
            //return $ex->getMessage();
            return redirect()->route('blog')->with('error','error in commnet');
        }

    }
}
