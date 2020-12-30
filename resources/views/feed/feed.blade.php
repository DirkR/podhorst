<?=
'<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
?>

<rss version="2.0"
     xmlns:itunes="http://www.itunes.com/dtds/podcast-1.0.dtd"
     xmlns:atom="http://www.w3.org/2005/Atom">
    <channel>
        <title>{{ $feed->title }} - {{ config('app.name', 'podhorst') }}</title>
        <link>{{ $feed->linkhomepage_url }}</link>
        <description>{{ $feed->description }}".</description>
        <lastBuildDate>{{ $feed->published_at }}</lastBuildDate>
        <image>
            <url>{{ $feed->image }}</url>
            <title>{{ $feed->title }} - {{ config('app.name', 'podhorst') }}</title>
            <link>{{ $feed->link }}</link>
        </image>
        <language>{{ config('podhorst.language', 'de-de') }}</language>
        <generator>{{ config('podhorst.generator', 'https://git.bei3.net/dirkr/podhorst') }}</generator>
        <itunes:image href="{{ config('podhorst.default_logo.url') }}"></itunes:image>

        @foreach($items as $item)
        <item>
            <title>{{ $item->title }}</title>
            <link>{{ $item->link }}</link>
            <pubDate>{{ $item->published_at }}</pubDate>
            <author>{{ $item->author }}</author>
            <guid isPermaLink="false">{{ $item->slug }}</guid>
            <description><![CDATA[Show: {{ $item->label }}<br>Copyright: <a
                    href="{{ $item->link }}">{{ $item->author }}</a>]]>
            </description>
            <enclosure url="{{ $item->slug }}" length="{{ $item->filesize }}"
                       type="{{ $item->mimetype }}"></enclosure>
            <itunes:duration>{{ $item->duration }}</itunes:duration>
            <itunes:image href="{{ $item->icon_url }}"></itunes:image>
            <itunes:summary>{{ $item->title }}, Link: {{ $item->link }}</itunes:summary>
        </item>
        @endforeach
    </channel>
</rss>
