<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    use HasFactory;

    protected $fillable = [
        'label',
        'description',
        'slug',
        'url',
    ];

    /**
     * Get the comments for the blog post.
     */

    public function shows()
    {
        return $this->hasMany(Show::class);
    }
}
