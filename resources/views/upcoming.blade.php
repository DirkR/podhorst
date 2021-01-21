<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('app.Next recordings')
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="lg:max-w-7xl mx-auto max-w-full sm:px-6 lg:px-8">
            <x-card>
                <h3 class="text-xl p-4 pb-8">@lang('app.Next recordings')</h3>
                @foreach($upcoming_shows as $show)
                    <table class="w-full">
                        <tr>
                            <td class="w-1/12 align-top pr-4">
                                @if($show->icon_url)
                                    <img class="w-20 h-20" src="{{$show->icon_url}}" alt="@lang('app.Show') Logo">
                                @elseif($show->station->icon_url)
                                    <img class="w-20 h-20" src="{{$show->station->icon_url}}"
                                         alt="@lang('app.Station') Logo">
                                @else
                                    <img class="w-20 h-20" src="{{config('podhorst.default_logo.url')}}"
                                         alt="{{config('podhorst.default_logo.copyright')}}">
                                @endif
                            </td>
                            <td class="w-1/3 align-top">
                                <a class="underline" href="{{route('show.show', ['show' => $show->id])}}"
                                   title="@lang('app.Show show')">{{$show->label}}</a>
                            </td>
                            <td class="w-1/4 align-top">
                                <a class="underline" href="{{route('station.show', ['station' => $show->station->id])}}"
                                   title="@lang('app.Show station')">{{$show->station->label}}</a>
                            </td>
                            <td class="w-1/4 align-top">{{$show->next_recording_at->format(config('podhorst.datetime_format', 'd.m.Y H:I')) }}</td>
                        </tr>
                    </table>
                @endforeach
            </x-card>

            <x-card>
                <h3 class="text-xl p-4 pb-8">@lang('app.No upcoming recordings')</h3>
                @foreach($no_shows as $show)
                    <table class="w-full">
                        <tr>
                            <td class="w-1/12 align-top pr-4">
                                @if($show->icon_url)
                                    <img class="w-20 h-20" src="{{$show->icon_url}}" alt="@lang('app.Show') Logo">
                                @elseif($show->station->icon_url)
                                    <img class="w-20 h-20" src="{{$show->station->icon_url}}"
                                         alt="@lang('app.Station') Logo">
                                @else
                                    <img class="w-20 h-20" src="{{config('podhorst.default_logo.url')}}"
                                         alt="{{config('podhorst.default_logo.copyright')}}">
                                @endif
                            </td>
                            <td class="w-1/3 align-top">
                                <a class="underline" href="{{route('show.show', ['show' => $show->id])}}"
                                   title="@lang('app.Show show')">{{$show->label}}</a>
                            </td>
                            <td class="w-1/4 align-top">
                                <a class="underline" href="{{route('station.show', ['station' => $show->station->id])}}"
                                   title="@lang('app.Show station')">{{$show->station->label}}</a>
                            </td>
                            <td class="w-1/4 align-top">&nbsp;</td>
                        </tr>
                    </table>
                @endforeach
            </x-card>
        </div>
    </div>
</x-app-layout>
