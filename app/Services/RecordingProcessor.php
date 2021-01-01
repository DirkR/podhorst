<?php

namespace App\Services;

use App\Models\Show;
use Carbon\Carbon;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class RecordingProcessor
{

    public function record(Show $show): Model
    {
        $stream_url = StreamUrlResolver::resolve($show->station->stream_url);

        $start_time = Carbon::now();
        $end_time = $start_time->addMinutes($show->duration);

        $station_slug = $show->station->slug;
        $show_slug = $show->slug;
        $episode_slug = sprintf("%s-%s-%s.mp3", $station_slug, $show_slug, $start_time->format("Y-m-d-H-i"));

        $client = new Client(['stream' => true]);

        try {
            $response = $client->get($stream_url);
            $body = $response->getBody();
            while (!$body->eof()) {
                Storage::disk('public')->append(
                    $episode_slug,
                    $body->read(10240)
                );

                if ($end_time->lessThan(Carbon::now())) {
                    break;
                }
            }
        } catch (GuzzleException $e) {
            info("Error while accessing stream URL: $e");
        }

        /* @var \App\Models\Episode */
        $episode = $show->episodes()->create(
            [
                "label" => __(
                    "app.Episode of \":title\" on :date",
                    [
                        'title' => $show->label,
                        'date' => $start_time->format(config('podhorst.date_format', 'Y-m-d')),
                    ]
                ),
                "slug" => $episode_slug,
            ]
        );

        return $episode;
    }

}
