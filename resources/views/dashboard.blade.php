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
                            <td class="w-1/6 align-top">
                                <a class="inline-block" href="{{route('station.show', ['station' => $station->id])}}">{{$station->label}}</a>
                                <a class="inline-block" href="{{route('station.show', ['station' => $station->id])}}" title="@lang('app.Show station')"><x-heroicon-o-eye class="h-4 w-4 text-gray-400"/></a>
                                <a class="inline-block" href="{{route('station.edit', ['station' => $station->id])}}" title="@lang('app.Edit station')"><x-heroicon-o-pencil class="h-4 w-4 text-gray-400"/></a>
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

                                        </li>
                                    @endforeach
                                </ul>
                            </td>
                            <td class="w-1/6 align-top">

                            </td>
                        </tr>
                    </table>
                </x-card>
            @endforeach
        </div>
    </div>
</x-app-layout>
