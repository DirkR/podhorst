<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Show extends Model
{
    use HasFactory;

    protected $fillable = [
        'label',
        'description',
        'slug',
    ];

    /**
     * Get the post that owns the comment.
     */
    public function station()
    {
        return $this->belongsTo(Station::class);
    }

    /**
     * Get the comments for the blog post.
     */
    public function episodes()
    {
        return $this->hasMany(Episode::class);
    }

}
