<?php

namespace App\Http\Controllers;

use App\DataObjects\Feed;
use App\DataObjects\FeedItem;
use App\Models\Episode;
use App\Models\Station;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Carbon;

class PodcastFeedController extends Controller
{
    public function allFeed(Request $request)
    {
        $episodes = Episode::all()->sortByDesc('created_at');
        $newest_item = Arr::first($episodes);

        $feed = Feed::create(
            [
                'title' => 'All recordings',
                'description' => config('podhorst.description'),
                'link' => config('podhorst.base_url'),
                'image' => config('podhorst.default_logo.url'),
                'author' => config('podhorst.author'),
                'email' => config('podhorst.email'),
                'category' => 'Miscellanious',
                'last_build_date' => $newest_item->created_at->format('r'),
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
        $episodes = $station->episodes->sortByDesc('created_at');
        $newest_item = Arr::first($episodes);

        $feed = Feed::create(
            [
                'title' => $station->label,
                'description' => $station->description,
                'link' => $station->homepage_url ?? config('podhorst.base_url'),
                'image' => $station->icon_url,
                'author' => $station->label,
                'email' => config('podhorst.email'),
                'category' => 'Miscellanious',
                'last_build_date' => $newest_item->created_at->format('r'),
                'language' => config('podhorst.language'),
                'copyright' => date('Y') . ' ' . config('podhorst.copyright'),
            ]
        );

        $items = $this->createItemsList($episodes);

        return view('feed.feed', compact('feed', 'items'));
    }

    public function showFeed(Request $request, string $station_slug, string $show_slug)
    {
        $station = Station::where('slug', $station_slug)->first();
        $show = $station->shows->where('slug', $show_slug)->first();

        $episodes = $show->episodes->sortByDesc('created_at');
        $newest_item = Arr::first($episodes);

        $feed = Feed::create(
            [
                'title' => 'All About Everything',
                'description' => 'Great site description',
                'link' => $show->homepage_url ?? $station->homepage_url ?? config('podhorst.base_url'),
                'image' => $show->icon_url ?? $station->icon_url ?? config('podhorst.default_logo.url'),
                'author' => config('podhorst.author'),
                'email' => config('podhorst.email'),
                'category' => 'Miscellanious',
                'last_build_date' => ($newest_item ? $newest_item->created_at :  Carbon::now())->format('r'),
                'language' => config('podhorst.language'),
                'copyright' => date('Y') . ' ' . config('podhorst.copyright'),
            ]
        );

        $items = $this->createItemsList($episodes);

        return view('feed.feed', compact('feed', 'items'));
    }

    public function createItemsList(Collection $episodes): Collection
    {
        return $episodes->map(
            function (Episode $episode) {
                if ($episode->filesize === 0 && Storage::disk('public')->exists($episode->slug)) {
                    $episode->filesize = Storage::disk('public')->size($episode->slug);
                }
                $duration = $episode->updated_at->diff($episode->created_at)->format('%H:%I:%S.000');
                return FeedItem::create(
                    [
                        'title' => $episode->show->label . ', ' . $episode->created_at->format(
                                config('podhorst.date_format', 'd.m.Y')
                            ),
                        'description' => $episode->description,
                        'author' => $episode->station ? $episode->station->label : "Unknown",
                        'filesize' => $episode->filesize,
                        'mimetype' => $episode->mimetype,
                        'publish_at' => $episode->created_at->format('r'),
                        'guid' => $episode->slug,
                        'url' => sprintf("%s/storage/%s", config('podhorst.base_url'), $episode->slug),
                        'duration' => $duration, # $episode->show->duration,
                        'image' => $episode->show->icon_url ?? $episode->station->icon_url,
                        'link' => $episode->show->homepage_url ?? $episode->station->homepage_url,
                    ]
                );
            }
        );
    }

}
