<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('app.Dashboard')
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="lg:max-w-7xl mx-auto max-w-full sm:px-6 lg:px-8">
            @foreach($stations as $station)
                <div class="bg-white shadow-xl sm:rounded-lg m-4 p-4">
                    <table class="w-full">
                        <tr>
                            <td class="w-1/6 align-top"><a
                                    href="{{route('station.show', ['station' => $station->id])}}">{{$station->label}}</a>
                            </td>
                            <td class="w-1/2 align-top">{{$station->description}}</td>
                            <td class="w-1/3 align-top">
                                <ul class="list-disc">
                                    @foreach($station->shows as $show)
                                        <li>
                                            <a href="{{route('show.show', ['show' => $show->id])}}">{{$show->label}}
                                                ({{ $show->episodes->count() }})</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </td>
                        </tr>
                    </table>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
