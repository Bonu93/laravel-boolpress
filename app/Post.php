<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{

    public function category() {
        return $this->belongsTo('App\Category');
    }

    public function tags() {
        return $this->belongsToMany('App\Admin\Tag');
    }


    protected $fillable = [
        'title', 
        'content',
        'slug',
        'category_id',
    ];
}
