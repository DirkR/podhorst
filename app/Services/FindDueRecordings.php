<?php


namespace App\Services;


use App\Models\Show;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class FindDueRecordings
{

    public static function find(): Collection
    {
        $now = Carbon::now();
        $now->second = 0;
        return (new static())->findDueShows($now);
    }

    public static function findAt(Carbon $date): Collection
    {
        return (new static())->findDueShows($date);
    }

    protected function findDueShows(Carbon $date): Collection
    {
        return Show::where('active', 1)
            ->where('next_recording_at', '<=', $date)
            ->get();
    }
}
