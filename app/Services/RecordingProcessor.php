<?php


namespace App\Services;


use App\Models\Episode;
use Illuminate\Support\Facades\Http;

class RecordingProcessor
{

    public function record(Episode  $episode)
    {
        $stream_URL = $this->getStreamURL($episode);

    }

    private function getStreamURL(Episode $episode)
    {
        $response = Http::get($episode->station->stream_url, [
            'name' => 'Taylor',
            'page' => 1,
        ]);
    }
}
