<?php

namespace Tests\Services;

use App\Services\StreamUrlResolver;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class StreamUrlResolverTest extends TestCase
{

    protected function setUp(): void
    {
        parent::setUp();
        Http::fake(
            [
                'example.org/stream.m3u' => Http::response(
                    "http://example.org/stream.mp3\nhttp://example.org/stream2.mp3",
                    200,
                    ["Content-Type" => "audio/x-mpegurl"]
                ),
                'example.org/extstream.m3u' => Http::response(
                    "#EXTM3U\n#EXTENC: bla\nhttp://example.org/stream.mp3\nhttp://example.org/stream2.mp3",
                    200,
                    ["Content-Type" => "audio/x-mpegurl"]
                ),
                'example.org/stream.mp3' => Http::response(
                    'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy',
                    200,
                    ["Content-Type" => "audio/mpeg"]
                ),
                '*' => Http::response('Hello World', 500, ['Invalid' => 'Headers']),
            ]
        );
    }

    public function test_mp3_url()
    {
        $stream_url = "http://example.org/stream.mp3";

        $result = StreamUrlResolver::resolve($stream_url);
        $this->assertEquals($stream_url, $result);
    }

    public function test_m3u_url()
    {
        $m3u_url = "http://example.org/stream.m3u";
        $stream_url = "http://example.org/stream.mp3";

        $result = StreamUrlResolver::resolve($m3u_url);
        $this->assertEquals($stream_url, $result);
    }

    public function test_extm3u_url()
    {
        $m3u_url = "http://example.org/extstream.m3u";
        $stream_url = "http://example.org/stream.mp3";

        $result = StreamUrlResolver::resolve($m3u_url);
        $this->assertEquals($stream_url, $result);
    }

}
