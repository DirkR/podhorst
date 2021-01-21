<?php

namespace App\Console\Commands;

use App\Jobs\RecordEpisode;
use App\Models\Episode;
use App\Models\Show;
use App\Services\FindDueRecordings;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Collection;

class CheckForJobs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'podhorst:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Queue jobs for radio shows to be recorded';

    public function handle(): int
    {
        $this->warn("Running 'podhorst:check'");
        $shows = FindDueRecordings::find()->each(function ($show) {
            $this->info("Running job for {$show->label}");
            RecordEpisode::dispatch($show);
        });

        return 0;
    }

}
