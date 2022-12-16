<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Post extends Model
{
    use SoftDeletes;
    protected $fillable=['title','content','author','image','created_at','updated_at','deleted_at'];


    public function comments(){
        return $this->hasMany('App\Models\Comment');
    }
}
