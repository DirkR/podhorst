<?php

namespace App\Models;

use Carbon\Carbon;
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
 * @property \Illuminate\Support\Carbon|null $next_recording_at
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
        'next_recording_at',
    ];

    protected static function booted()
    {
        static::saving(
            function ($show) {
                $show->next_recording_at = $show->start_time();
            }
        );
    }

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

    /**
     * Calculate the start time based on the time values of the Show object
     *
     * @return Carbon
     */
    public function start_time(): Carbon
    {
        $today = Carbon::today();
        $dayOfWeek = $today->dayOfWeek;
        if ($dayOfWeek === 0) {
            $dayOfWeek = 7;
        }

        if ($this->day == $dayOfWeek) {
            $started_at = Carbon::today()->addHours($this->hour)->addMinutes($this->minute);
            $now = Carbon::now();
            $day_offset = ($now < $started_at) ? 0 : 7;
        } elseif ($this->day > $dayOfWeek && $dayOfWeek !== 7) {
            $day_offset = $dayOfWeek - $this->day;
        } else {
            $day_offset = (7 - $dayOfWeek) + $this->day;
        }

        return $today->addDays($day_offset)->addHours($this->hour)->addMinutes($this->minute);
    }

    /**
     * Calculate the end time based on the time values and duration of the Show object
     *
     * @return Carbon
     */
    public function end_time(): Carbon
    {
        return $this->start_time()->addMinutes($this->duration);
    }

}
