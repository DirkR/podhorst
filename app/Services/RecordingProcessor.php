<?php

namespace App\Services;

use App\Models\Episode;
use App\Models\Show;
use Carbon\Carbon;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class RecordingProcessor
{

    public function record(Show $show): Model
    {
        $stream_url = StreamUrlResolver::resolve($show->station->stream_url);

        $start_time = Carbon::now();
        $end_time = $start_time->addMinutes($show->duration);

        {
            // Wait a second and calculate the Show::next_recording_at date
            sleep(1);
            $show->save();
        }

        $formatted_start_time = $start_time->format(
            config('podhorst.date_format', 'Y-m-d')
        );

        $station_slug = $show->station->slug;
        $show_slug = $show->slug;
        $episode_slug = sprintf("%s-%s-%s.mp3", $station_slug, $show_slug, $start_time->format("Y-m-d-H-i"));

        /* @var Episode $episode */
        $episode = $show->episodes()->create(
            [
                "label" => __(
                    "app.\":title\" on :date",
                    [
                        'title' => $show->label,
                        'date' => $formatted_start_time,
                    ]
                ),
                "description" => __(
                    "app.Episode of \":title\" on :date",
                    [
                        'title' => $show->label,
                        'date' => $formatted_start_time,
                    ]
                ),
                "slug" => $episode_slug,
                "status" => Episode::PENDING,
            ]
        );

        $client = new Client(['stream' => true]);

        try {
            $response = $client->get($stream_url);
            $episode->mimetype = Arr::first($response->getHeader( 'Content-Type'));

            $body = $response->getBody();
            while (!$body->eof()) {
                Storage::disk('public')->append(
                    $episode_slug,
                    $body->read(10240)
                );

                if (Carbon::now()->greaterThan($end_time)) {
                    break;
                }
            }
        } catch (GuzzleException $e) {
            Log::warning("Error while accessing stream URL: $e");
        }

        $episode->duration = Carbon::now()->diffInMinutes($start_time);
        $episode->status = Episode::RECORDED;
        $episode->filesize = Storage::disk('public')->size($episode_slug);
        $episode->save();

        return $episode;
    }

}
