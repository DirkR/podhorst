<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Show
 *
 * @property int $id
 * @property int $station_id
 * @property string $label
 * @property string|null $description
 * @property string $slug
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $active
 * @property int $duration
 * @property int $day
 * @property int $hour
 * @property int $minute
 * @property string|null $homepage_url
 * @property string|null $icon_url
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Episode[] $episodes
 * @property-read int|null $episodes_count
 * @property-read \App\Models\Station $station
 * @method static \Illuminate\Database\Eloquent\Builder|Show newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Show newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Show query()
 * @method static \Illuminate\Database\Eloquent\Builder|Show whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Show whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Show whereDay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Show whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Show whereDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Show whereHomepageUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Show whereHour($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Show whereIconUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Show whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Show whereLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Show whereMinute($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Show whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Show whereStationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Show whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Show extends Model
{
    use HasFactory;

    protected $fillable = [
        'station_id',
        'label',
        'description',
        'slug',
        'homepage_url',
        'icon_url',
        'duration',
        'day',
        'hour',
        'minute',
        'active',
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
