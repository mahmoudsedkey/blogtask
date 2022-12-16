<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequeston;
use Illuminate\Http\Request;
use App\Models\Post;
use Exception;
use PHPUnit\Framework\MockObject\Stub\ReturnReference;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::withTrashed()->get();
        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->image;

      try{
       $file_path=uploadImage('images',$request->image);
       $post=Post::create([
            'title'=>$request->title,
            'content'=>$request->content,
            'author'=>$request->author,
            'image'=>$file_path,
       ]);
       return redirect()->route('post.create')->with('success','post create successfully');
    }
    catch(\Exception $ex){

        return redirect()->route('post.create')->with('error','try again');
    }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       try
       {
            $post=Post::find($id);
            if(!$post)
                return redirect()->route('post.index')->with('error','post not found');
            return view('admin.posts.edit',compact('post'));
       }
       catch(\Exception $e){
         return redirect()->route('post.index')->with('error','an error');

       }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequeston $request, $id)
    {
        try{
            $post=Post::find($id);
            if(!$post)
                return redirect()->route('post.index')->with('error','post not found');
            $file_path=$post->image;
            if($request->has('image'))
             $file_path=uploadImage('images',$request->image);

            $post->update([
                'title'=>$request->title,
                'content'=>$request->content,
                'author'=>$request->author,
                'image'=>$file_path,
            ]);
            return redirect()->route('post.index')->with('success','post update successfully');
        }
        catch(Exception $e){
            return $e->getMessage();
            return redirect()->route('post.index')->with('error','an error');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $post=Post::withTrashed()->find($id);
        if(!$post)
          return redirect()->route('post.index')->with('error','post not found');
        $post->forceDelete();
        return redirect()->route('post.index')->with('success','post delete successfully');

    }

    /**
     * soft delete the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function softDelete($id){
        $post=Post::find($id);
        if(!$post)
          return redirect()->route('post.index')->with('error','post not found');
          $post->softDeletes();
        return redirect()->route('post.index')->with('success','post soft delete successfully');
    }

    public function restore($id){
        $post=Post::withTrashed()->find($id);
        $post->restore();
        return redirect()->route('post.index')->with('success','post restore successfully');
    }

}
