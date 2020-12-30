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
        'homepage_url',
        'stream_url',
        'icon_url',
    ];

    public function shows()
    {
        return $this->hasMany(Show::class);
    }

    public function episodes()
    {
        return $this->hasManyThrough(Episode::class, Show::class);
    }
}
