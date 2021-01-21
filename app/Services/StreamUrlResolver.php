<?php


namespace App\Services;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class StreamUrlResolver
{

    public static function resolve(string $stream_url): ?string
    {
        return (new StreamUrlResolver())->resolveUrl($stream_url);
    }

    public function resolveUrl($stream_url)
    {
        $response = Http::head($stream_url);
        $content_type = $response->header("Content-Type");
        switch ($content_type) {
            case "application/vnd.apple.mpegurl":
            case "application/mpegurl":
            case "application/x-mpegurl":
            case "audio/mpegurl":
            case "audio/x-mpegurl":
                return $this->getStreamURLFromM3u($stream_url);

            case "audio/x-scpls":
                return $this->getStreamURLFromPls($stream_url);

            case "audio/mpeg":
                return $stream_url;
        }
        return null;
    }

    private function getStreamURLFromM3u(string $m3u_url): string
    {
        $response = Http::get($m3u_url);
        return collect(explode("\n", $response->body()))
            ->filter(
                function ($line) {
                    return !Str::startsWith(Str::lower($line), "#ext");
                }
            )
            ->first();
    }

    private function getStreamURLFromPls($pls_url)
    {
        $response = Http::get($pls_url);
        return collect(explode("\n", $response->body()))
            ->filter(
                function ($line) {
                    return Str::startsWith(Str::lower($line), "file");
                }
            )
            ->map(function ($line) {
                return preg_replace('/^.*File[0-9]*=/', '', $line);
            })
            ->shuffle()
            ->first();

    }
}
