<?php

namespace Tests\Unit;

use App\Models\Episode;
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
                            ['day' => $d, 'hour' => $h, 'minute' => $m],
                            ['day' => $d, 'hour' => $h, 'minute' => $m, 'active' => false],
                            ['day' => $d, 'hour' => $h, 'minute' => $m + 1],
                            ['day' => $d, 'hour' => $h, 'minute' => $m - 1],
                            ['day' => $d, 'hour' => $h - 1, 'minute' => $m - 10],
                            ['day' => $d, 'hour' => $h, 'minute' => $m + 10],
                            ['day' => $d, 'hour' => $h + 5, 'minute' => $m],
                            ['day' => $d + 1, 'hour' => $h, 'minute' => $m],
                        )
                    )
            )
            ->create();

        /* @var Show $show */
        $show = Show::where('day', $d)->where('hour', $h)->where('minute', $m)->first();
        $e = $show->episodes()->create(
            [
                'label' => "foo",
                'status' => Episode::PENDING,
                'description' => "bar",
                "slug" => sprintf(
                    "%s-%s-%s.mp3",
                    $show->station->slug,
                    $show->slug,
                    $show->start_time()->format("Y-m-d-H-i")
                ),
            ]
        );

        $this->assertDatabaseCount('stations', 1);
        $this->assertDatabaseCount('shows', 7);
        $this->assertDatabaseCount('episodes', 1);

        $result = FindDueRecordings::find();
        $this->assertEquals(2, $result->count());
    }


    public function test_find_shows_at_time()
    {
        $time = Carbon::today()->nextWeekday()->addHours(2)->addMinutes(23);

        $d = $time->dayOfWeek;
        $h = $time->hour;
        $m = $time->minute;

        Station::factory()
            ->has(
                Show::factory()
                    ->count(7)
                    ->state(
                        new Sequence(
                            ['day' => $d, 'hour' => $h, 'minute' => $m],
                            ['day' => $d, 'hour' => $h, 'minute' => $m, 'active' => false],
                            ['day' => $d, 'hour' => $h, 'minute' => $m + 1],
                            ['day' => $d, 'hour' => $h, 'minute' => $m - 1],
                            ['day' => $d, 'hour' => $h - 1, 'minute' => $m - 10],
                            ['day' => $d, 'hour' => $h, 'minute' => $m + 10],
                            ['day' => $d, 'hour' => $h + 5, 'minute' => $m],
                            ['day' => $d == 7 ? 1 : $d - 1, 'hour' => $h, 'minute' => $m],
                        )
                    )
            )
            ->create();

        /* @var Show $show */
        $show = Show::where('day', $d)->where('hour', $h)->where('minute', $m)->first();
        $e = $show->episodes()->create(
            [
                'label' => "foo",
                'status' => Episode::PENDING,
                'description' => "bar",
                "slug" => sprintf(
                    "%s-%s-%s.mp3",
                    $show->station->slug,
                    $show->slug,
                    $show->start_time()->format("Y-m-d-H-i")
                ),
            ]
        );

        $this->assertDatabaseCount('stations', 1);
        $this->assertDatabaseCount('shows', 7);
        $this->assertDatabaseCount('episodes', 1);

        $result = FindDueRecordings::findAt($time);
        $this->assertEquals(2, $result->count());
    }
}
