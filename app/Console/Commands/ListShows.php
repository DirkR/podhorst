<?php

namespace App\Console\Commands;

use App\Models\Show;
use Illuminate\Console\Command;

class ListShows extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'podhorst:shows';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'List all defined shows';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $this->table(
            [
                'station',
                'label',
                'active',
                'day',
                'hour',
                'minute',
                'duration',
                'next_recording_at',
            ],
            Show::all()->map(
                function (Show $show) {
                    $next_recording_at = $show->next_recording_at ?? $show->start_time();
                    $active = $show->active ? __('app.Yes') : __('app.No');
                    $day = __("app.days.{$show->day}");
                    return [
                        'station' => $show->station->label,
                        'label' => $show->label,
                        'active' => $active,
                        'day' => $day,
                        'hour' => $show->hour,
                        'minute' => $show->minute,
                        'duration' => $show->duration,
                        'next_recording_at' => $next_recording_at,
                    ];
                }
            )->toArray()
        );
    }
}
