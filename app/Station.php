<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    /**
     * Get the comments for the blog post.
     */
    public function shows()
    {
        return $this->hasMany('App\Show');
    }
}
