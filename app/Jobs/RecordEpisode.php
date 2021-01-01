<?php

namespace App\Jobs;

use App\Models\Show;
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

    protected Show $show;

    public function __construct(Show $show)
    {
        $this->show = $show->withoutRelations();
    }

    public function handle(RecordingProcessor $processor): void
    {
        $processor->record($this->show);
    }
}
