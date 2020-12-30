<?php

namespace App\Http\Controllers;

use App\DataObjects\Feed;
use App\DataObjects\FeedItem;
use App\Models\Episode;
use App\Models\Station;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class PodcastFeedController extends Controller
{
    public function allFeed(Request $request)
    {
        $episodes = Episode::all();

        $feed = Feed::create(
            [
                'title' => 'All recordings',
                'description' => config('podhorst.description'),
                'link' => config('podhorst'),
                'image' => config('podhorst.default_logo.url'),
                'author' => config('podhorst.author'),
                'email' => config('podhorst.email'),
                'category' => 'Miscellanious',
                'language' => config('podhorst.language'),
                'copyright' => date('Y') . ' ' . config('podhorst.copyright'),
            ]
        );

        $items = $this->createItemsList($episodes);

        return view('feed.feed', compact('feed', 'items'));
    }

    public function stationFeed(Request $request, string $station_slug)
    {
        $station = Station::where('slug', $station_slug)->first();

        $feed = Feed::create(
            [
                'title' => $station->label,
                'description' => $station->description,
                'link' => $station->homepage_url,
                'image' => $station->icon_url,
                'author' => $station->label,
                'email' => config('podhorst.email'),
                'category' => 'Miscellanious',
                'language' => config('podhorst.language'),
                'copyright' => date('Y') . ' ' . config('podhorst.copyright'),
            ]
        );

        $items = $this->createItemsList($station->episodes);

        return view('feed.feed', compact('feed', 'items'));
    }

    public function showFeed(Request $request, string $station_slug, string $show_slug)
    {
        $station = Station::where('slug', $station_slug)->first();
        $show = $station->shows->where('slug', $show_slug)->first();

        $feed = Feed::create(
            [
                'title' => 'All About Everything',
                'description' => 'Great site description',
                'link' => $show->homepage_url,
                'image' => config('podhorst.default_logo.url'),
                'author' => config('podhorst.author'),
                'email' => config('podhorst.email'),
                'category' => 'Miscellanious',
                'language' => config('podhorst.language'),
                'copyright' => date('Y') . ' ' . config('podhorst.copyright'),
            ]
        );

        $items = $this->createItemsList($show->episodes);

        return view('feed.feed', compact('feed', 'items'));
    }

    public function createItemsList(Collection $episodes): Collection
    {
        return $episodes->map(
            function ($episode) {
                return FeedItem::create(
                    [
                        'title' => $episode->label,
                        'description' => $episode->description,
                        'author' => $episode->station->label,
                        'filesize' => 0,
                        #'publish_at' => $episode->publish_at,
                        'guid' => route('episode.show', $episode->slug),
                        //'url' => $episode->media->url(),
                        //'type' => $episode->media_content_type,
                        'duration' => $episode->show->duration,
                        'image' => $episode->show->icon_url,
                    ]
                );
            }
        );
    }

}
