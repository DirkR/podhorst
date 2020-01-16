<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Show extends Model
{
    /**
     * Get the post that owns the comment.
     */
    public function station()
    {
        return $this->belongsTo('App\Station');
    }

    /**
     * Get the comments for the blog post.
     */
    public function episodes()
    {
        return $this->hasMany('App\Episode');
    }

}
