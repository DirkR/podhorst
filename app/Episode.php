<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    protected $fillable = [
        'label', 'description', 'slug'
    ];
    /**
     * Get the post that owns the comment.
     */
    public function show()
    {
        return $this->belongsTo('App\Show');
    }

}
