<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // public function category()
    // {
    //     return $this->hasMany('App\Category');
    // } 
     
    public function category()
    {
        return $this->belongsTo('App\Category','category_id');
    } 
}