<?php

namespace Tests\Unit;

use App\Models\Show;
use App\Models\Station;
use App\Services\FindDueRecordings;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FindDueRecordingsTest extends TestCase
{
    use RefreshDatabase;

    public function test_find_shows()
    {
        $now = Carbon::now();

        $d = $now->dayOfWeek;
        $h = $now->hour;
        $m = $now->minute;

        Station::factory()
            ->has(
                Show::factory()
                    ->count(7)
                    ->state(
                        new Sequence(
                            ['day' => $d, 'hour' => $h, 'minute' => $m, 'duration' => 55],
                            ['day' => $d, 'hour' => $h, 'minute' => $m, 'duration' => 55, 'active' => false],
                            ['day' => $d, 'hour' => $h, 'minute' => $m + 1, 'duration' => 55],
                            ['day' => $d, 'hour' => $h, 'minute' => $m - 1, 'duration' => 55],
                            ['day' => $d, 'hour' => $h - 1, 'minute' => $m - 10, 'duration' => 55],
                            ['day' => $d, 'hour' => $h, 'minute' => $m + 10, 'duration' => 55],
                            ['day' => $d, 'hour' => $h + 2, 'minute' => $m, 'duration' => 55],
                            ['day' => $d == 7 ? 1 : $d + 1, 'hour' => $h, 'minute' => $m, 'duration' => 55],
                        )
                    )
            )
            ->create();

        $this->assertDatabaseCount('stations', 1);
        $this->assertDatabaseCount('shows', 7);
        $this->assertDatabaseCount('episodes', 0);

        $result = FindDueRecordings::find();
        $this->assertEquals(3, $result->count());
    }


    public function test_find_shows_at_time()
    {
        $date = Carbon::today()->nextWeekday()->addHours(2)->addMinutes(23);

        $d = $date->dayOfWeek;
        $h = $date->hour;
        $m = $date->minute;

        Station::factory()
            ->has(
                Show::factory()
                    ->count(7)
                    ->state(
                        new Sequence(
                            ['day' => $d, 'hour' => $h, 'minute' => $m, 'duration' => 55],
                            ['day' => $d, 'hour' => $h, 'minute' => $m, 'duration' => 55, 'active' => false],
                            ['day' => $d, 'hour' => $h, 'minute' => $m + 1, 'duration' => 55],
                            ['day' => $d, 'hour' => $h, 'minute' => $m - 1, 'duration' => 55],
                            ['day' => $d, 'hour' => $h - 1, 'minute' => $m - 10, 'duration' => 55],
                            ['day' => $d, 'hour' => $h, 'minute' => $m + 10, 'duration' => 55],
                            ['day' => $d, 'hour' => $h + 5, 'minute' => $m, 'duration' => 55],
                            ['day' => $d == 7 ? 1 : $d - 1, 'hour' => $h, 'minute' => $m, 'duration' => 55],
                        )
                    )
            )
            ->create();

        Show::all()->each(
            function ($show) {
                print("[id={$show->id}, day={$show->day}, hour={$show->hour}, minute={$show->minute}, duration={$show->duration}, active={$show->active}, next_recording_at={$show->next_recording_at}]\n");
            }
        );

        $this->assertDatabaseCount('stations', 1);
        $this->assertDatabaseCount('shows', 7);
        $this->assertDatabaseCount('episodes', 0);

        $result = FindDueRecordings::findAt($date);

        print("date=$date\n");
        $result->each(
            function ($show) {
                print("[id={$show->id}, day={$show->day}, hour={$show->hour}, minute={$show->minute}, duration={$show->duration}, active={$show->active}, next_recording_at={$show->next_recording_at}]\n");
            }
        );

        $this->assertEquals(3, $result->count());
    }
}
