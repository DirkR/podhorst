<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('app.Dashboard')
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="lg:max-w-7xl mx-auto max-w-full sm:px-6 lg:px-8">
            @foreach($stations as $station)
                <x-card>
                    <table class="w-full">
                        <tr>
                            <td class="w-1/12 align-top pr-4">
                                @if($station->icon_url)
                                    <img class="w-20 h-20" src="{{$station->icon_url}}" alt="@lang('app.Station') Logo">
                                @else
                                    <img class="w-20 h-20" src="{{config('podhorst.default_logo.url')}}" alt="{{config('podhorst.default_logo.copyright')}}">
                                @endif
                            </td>
                            <td class="w-1/4 align-top">
                                <a class="inline-block" href="{{route('station.show', ['station' => $station->id])}}">{{$station->label}}</a>
                                <a class="inline-block" href="{{route('station.show', ['station' => $station->id])}}" title="@lang('app.Show station')"><x-heroicon-o-eye class="h-4 w-4 text-gray-400"/></a>
                                <a class="inline-block" href="{{route('station.edit', ['station' => $station->id])}}" title="@lang('app.Edit station')"><x-heroicon-o-pencil class="h-4 w-4 text-gray-400"/></a>
                                @if($station->homepage_url)
                                    <a class="inline-block" href="{{$station->homepage_url}}" title="@lang('app.Homepage')"><x-heroicon-o-globe-alt class="h-4 w-4 text-gray-400"/></a>
                                @else
                                    <a class="inline-block" href="#" title="@lang('app.Homepage')"><x-heroicon-o-globe-alt class="h-4 w-4 text-gray-200"/></a>
                                @endif

                                <a class="inline-block" href="/{{$station->slug}}/rss.xml" title="@lang('app.RSS Feed')"><x-heroicon-o-rss class="h-4 w-4 text-gray-400"/></a>
                            </td>
                            <td class="w-1/3 align-top">{{$station->description}}</td>
                            <td class="w-1/3 align-top">
                                <ul class="list-disc">
                                    @foreach($station->shows as $show)
                                        <li>
                                            <a class="inline-block" href="{{route('show.show', ['show' => $show->id])}}">{{$show->label}}
                                                ({{ $show->episodes->count() }})</a>
                                            <a class="inline-block" href="{{route('show.show', ['show' => $show->id])}}" title="@lang('app.Show show')"><x-heroicon-o-eye class="h-4 w-4 text-gray-400"/></a>
                                            <a class="inline-block" href="{{route('show.edit', ['show' => $show->id])}}" title="@lang('app.Edit show')"><x-heroicon-o-pencil class="h-4 w-4 text-gray-400"/></a>
                                            @if($show->homepage_url)
                                                <a class="inline-block" href="{{$show->homepage_url}}" title="@lang('app.Homepage')"><x-heroicon-o-globe-alt class="h-4 w-4 text-gray-400"/></a>
                                            @else
                                                <a class="inline-block" href="#" title="@lang('app.Homepage')"><x-heroicon-o-globe-alt class="h-4 w-4 text-gray-200"/></a>
                                            @endif
                                            <a class="inline-block" href="/{{$show->station->slug}}/{{$show->slug}}/rss.xml" title="@lang('app.RSS Feed')"><x-heroicon-o-rss class="h-4 w-4 text-gray-400"/></a>
                                        </li>
                                    @endforeach
                                    <a href="{{ route('show.create', ['station' => $station->id]) }}"><x-heroicon-o-plus class="h-6 w-6 text-gray-400"/></a>
                                </ul>
                            </td>
                        </tr>
                    </table>
                </x-card>
            @endforeach
                <a href="{{ route('station.create') }}"><x-heroicon-o-plus class="h-8 w-8 text-gray-400"/></a>
        </div>
    </div>
</x-app-layout>
