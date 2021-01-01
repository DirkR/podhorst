<?php

namespace App\Console\Commands;

use App\Models\Show;
use App\Models\Station;
use App\Services\RecordingProcessor;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class RecordShow extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'podhorst:record {show}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Record an episode of a radio show ';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(RecordingProcessor $processor)
    {
        $show = $this->findShow();
        $show->duration = 1;
        $episode = $processor->record($show);
        dd($episode);
        return 0;
    }

    private function findShow()
    {
        $show_slug = $this->argument('show');
        if (Str::contains($show_slug, "/")) {
            [$station_slug, $show_slug] = explode("/", $show_slug);
            $station = Station::where('slug', $station_slug)->first();
            if (!$station) {
                return null;
            }

            return $station->shows->where('slug', $show_slug)->first();
        }

        return Show::where('slug', $show_slug)->first();

    }
}
