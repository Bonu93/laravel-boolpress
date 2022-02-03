<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{

    public function category() {
        return $this->belongsTo('App\Category');
    }


    protected $fillable = [
        'title', 
        'content',
        'slug',
        'category_id',
    ];
}
