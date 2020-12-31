<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Episode
 *
 * @property int $id
 * @property int $show_id
 * @property string $label
 * @property string|null $description
 * @property string $slug
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Show $show
 * @property-read \App\Models\Station|null $station
 * @method static \Illuminate\Database\Eloquent\Builder|Episode newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Episode newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Episode query()
 * @method static \Illuminate\Database\Eloquent\Builder|Episode whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Episode whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Episode whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Episode whereLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Episode whereShowId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Episode whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Episode whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
