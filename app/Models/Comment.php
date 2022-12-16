<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable=['id','post_id','user_id','content'];
    protected $hidden=['created_at','updated_at'];

    public function user(){
        return $this->belongsTo('App\Models\Interactive','user_id','id');
    }
    public function post(){
        return $this->belongsTo('App\Models\Post','post_id','id');
    }

}
