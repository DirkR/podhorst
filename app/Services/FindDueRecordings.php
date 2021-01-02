<?php


namespace App\Services;


use App\Models\Episode;
use App\Models\Show;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class FindDueRecordings
{

    public static function find(): Collection
    {
        return (new static())->findDueShows(Carbon::now());
    }

    public static function findAt(Carbon $date): Collection
    {
        return (new static())->findDueShows($date);
    }

    protected function findDueShows(Carbon $date): Collection
    {
        $shows = Show::where('day', $date->format('N'))
            ->where('hour', $date->format('H'))
            ->get()
            ->filter(
                function ($show) use ($date) {
                    /* @var Show $show */
                    $start_time = $show->start_time();

                    if ($start_time->greaterThan($date) || $start_time->diffInMinutes($date) > 4) {
                        return 0;
                    }

                    $time_string = $start_time->format('Y-m-d-H-i');
                    $slug = sprintf("%s-%s-%s.mp3", $show->station->slug, $show->slug, $time_string);
                    $episode = Episode::where('slug', $slug)->first();
                    return !$episode ? 1 : 0;
                }
            );
        return $shows;
    }
}
