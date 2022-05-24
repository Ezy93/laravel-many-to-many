<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable =[
        'title',
        'author',
        'img_url',
        'description',
        'slug'
    ];

    public function categories(){
        return $this->belongsToMany('App\Models\Category');
    }
}
