<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
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
    public function show()
    {
        return $this->belongsTo(Show::class);
    }

    public function station()
    {
        return $this->hasOneThrough(
            Station::class,
            Show::class,
            'id',
            'id',
            'show_id',
            'station_id'
        );
    }
}
