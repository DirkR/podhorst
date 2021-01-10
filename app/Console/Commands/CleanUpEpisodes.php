<?php

namespace App\Console\Commands;

use App\Models\Episode;
use App\Services\DurationStringParser;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class CleanUpEpisodes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'podhorst:cleanup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cleanup obsolete episodes';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $now = Carbon::now();
        $storage_duration = DurationStringParser::process(
            config('podhorst.endurance', '15d')
        );
        if ($storage_duration == 0) {
            $storage_duration = 15 * 24 *3600;
        }

        Episode::all()
            ->filter(
                function (Episode $episode) use ($now, $storage_duration) {
                    $no_file = !(Storage::disk('public')->exists($episode->slug));
                    $overdue_episode = $now->diffInSeconds($episode->created_at) > $storage_duration;

                    return $no_file || $overdue_episode;
                }
            )
            ->each(
                function ($episode) {
                    $this->info("Deleted {$episode->label}");
                    $episode->delete();
                }
            );

        return 0;
    }

}
