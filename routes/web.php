<?php

use Facade\FlareClient\View;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/','HomeController@index')->name('blog');
Route::post('/comment','HomeController@comment')->name('user.comment');
//Route::resources('/admin/posts','PostController');
Route::post('admin/checkuser','AdminController@login')->name('admin.login');
Route::get('admin/login','AdminController@loginshow')->name('login');

Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){
    Route::get('dashboard','AdminController@index')->name('admin.dashboard');

   /* Post Route */
    Route::get('posts','PostController@index')->name('post.index');
    Route::get('posts/create','PostController@create')->name('post.create');
    Route::post('post/store','PostController@store')->name('post.store');
    Route::get('post/edit/{id}','PostController@edit')->name('post.edit');
    Route::post('post/update/{id}','PostController@update')->name('post.update');
    Route::get('post/delete/{id}','PostController@destroy')->name('post.delete');
    Route::get('softdelet/{id}','PostController@softdelete')->name('post.softdelete');
    Route::get('post/restore/{id}','PostController@restore')->name('post.restore');

    /* Comments Route */
    Route::get('comment/show/{id}','CommentController@show')->name('comments.show');
    Route::get('commnet/delete/{id}','CommentController@delete')->name('comment.delete');

    Route::get('logout','AdminController@logout')->name('admin.logout');
});






