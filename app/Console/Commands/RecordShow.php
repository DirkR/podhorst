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
    protected $description = 'Record an episode of a radio show';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle(RecordingProcessor $processor): int
    {
        $show = $this->findShow();
        $episode = $processor->record($show);
        $return = 0;

        if ($episode) {
            $this->info(__("Recorded :label", ['label' => $episode->label]));
        } else {
            $this->warn(__("Error occured while recording an episode of \":label\"", ['label' => $show->label]));
            $return = 1;
        }

        return $return;
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
