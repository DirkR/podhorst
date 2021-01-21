<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Station
 *
 * @property int $id
 * @property string $label
 * @property string|null $description
 * @property string $slug
 * @property string $homepage_url
 * @property string|null $icon_url
 * @property string $stream_url
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Show[] $shows
 * @property-read int|null $shows_count
 * @method static \Illuminate\Database\Eloquent\Builder|Station newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Station newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Station query()
 * @method static \Illuminate\Database\Eloquent\Builder|Station whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Station whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Station whereHomepageUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Station whereIconUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Station whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Station whereLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Station whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Station whereStreamUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Station whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
