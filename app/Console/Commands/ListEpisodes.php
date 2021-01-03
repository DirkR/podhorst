<?php

namespace App\Console\Commands;

use App\Models\Episode;
use Illuminate\Console\Command;

class ListEpisodes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'podhorst:episodes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'List all recorded show episodes';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $status = [
            1 => 'Pending',
            2 => 'Recorded',
        ];

        $this->table(
            [
                'show',
                'label',
                'status',
                'recorded at',
            ],
            Episode::all()->map(function($episode) use ($status) {
                return [
                    'show' => $episode->show->label,
                    'label' => $episode->label,
                    'status' => $status[$episode->status],
                    'recorded at' => $episode->created_at->format(config("podhorst.datetime_format")),
                ];
            }
            )->toArray()
        );
    }
}
