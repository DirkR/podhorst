<?php

namespace App\Jobs;

use App\Models\Episode;
use App\Services\RecordingProcessor;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class RecordEpisode implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected Episode $episode;

    public function __construct(Episode $episode)
    {
        $this->episode = $episode->withoutRelations();
    }

    public function handle(RecordingProcessor $processor): void
    {
        $processor->record($this->episode);
    }
}
