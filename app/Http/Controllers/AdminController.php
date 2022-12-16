<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
class AdminController extends Controller
{
    public function index(){
        $posts=Post::count();
        //return $posts;
        return view('admin.dashboard',compact('posts'));
    }
    public function loginshow(){
        return view('admin.login');
    }

    public function login(Request $request){

        $remember_me=$request->has('remember_me')? true : false;

        if(auth()->attempt(['email'=>$request->input('email'),'password'=>$request->input('password')],$remember_me))
           // notify()->success('تم تسجيل الدخول بنجاح');
           return redirect()->route('admin.dashboard');
        else
           // notify()->error('خطأ في البيانات برجاء المحاوله لاحقا');
           return redirect()->route('login')->with('error','البيانات غير صحيحه');
       }

       public function logout(){
        auth()->logout();
        return redirect('admin.login');
       }
    }

